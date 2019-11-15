<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\ParameterRoute;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObject;
use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObjectInterface;
use Funivan\CabbageCore\Http\Request\RequestInterface;
use Funivan\CabbageCore\Router\Match\Result\FailedMatchResult;
use Funivan\CabbageCore\Router\Match\Result\MatchResult;
use Funivan\CabbageCore\Router\Match\Result\MatchResultInterface;
use Funivan\CabbageCore\Router\Match\RouteMatchInterface;
use Funivan\CabbageCore\Router\Match\StaticRouteMatch;
use InvalidArgumentException;

/**
 * Check GET,POST,USER parameters
 */
class ParameterRoutMatch implements RouteMatchInterface
{

    /**
     * @var RouteMatchInterface
     */
    private $next;

    /**
     * @var ParameterConstrainInterface
     */
    private $constrain;

    /**
     * @var string
     */
    private $type;


    /**
     * @param string $type
     * @param ParameterConstrainInterface $constrain
     * @param RouteMatchInterface $next
     * @internal param array $parameters
     */
    private function __construct(string $type, ParameterConstrainInterface $constrain, RouteMatchInterface $next)
    {
        $this->next = $next;
        $this->constrain = $constrain;
        $this->type = $type;
    }


    /**
     * Check parameters and also perform match with next route
     *
     * @param string $type
     * @param ParameterConstrainInterface $constrain
     * @param RouteMatchInterface $next
     * @return ParameterRoutMatch
     */
    public static function createWithNext(string $type, ParameterConstrainInterface $constrain, RouteMatchInterface $next): ParameterRoutMatch
    {
        return new self($type, $constrain, $next);
    }


    /**
     * Check only parameters.
     * Next route match is always successful
     *
     * @param string $type
     * @param ParameterConstrainInterface $constrain
     * @return ParameterRoutMatch
     */
    public static function create(string $type, ParameterConstrainInterface $constrain): ParameterRoutMatch
    {
        return new self($type, $constrain, new StaticRouteMatch(MatchResult::createSuccess()));
    }


    /**
     * @param RequestInterface $request
     * @return MatchResultInterface
     */
    final public function match(RequestInterface $request): MatchResultInterface
    {
        $data = $this->retrieveBag($request);
        $result = new FailedMatchResult();
        if ($this->constrain->validate($data)) {
            $nextResult = $this->next->match($request);
            if ($nextResult->matched()) {
                $name = $this->constrain->name();
                $parameters = new ArrayObject([
                        $name => ($data->toArray()[$name] ?? null)
                    ]
                );
                $result = MatchResult::create(
                    true,
                    new ArrayObject(
                        array_merge_recursive(
                            $parameters->toArray(),
                            $nextResult->parameters()
                        )
                    )
                );
            }
        }
        return $result;
    }


    /**
     * @param RequestInterface $request
     * @return ArrayObjectInterface
     */
    private function retrieveBag(RequestInterface $request): ArrayObjectInterface
    {
        if ('GET' === $this->type) {
            $data = $request->get();
        } elseif ('POST' === $this->type) {
            $data = $request->post();
        } elseif ('USER' === $this->type) {
            $data = $request->parameters();
        } else {
            throw new InvalidArgumentException(
                sprintf('Invalid type: %s. Expect GET, POST, USE', $this->type)
            );
        }
        return $data;
    }

}