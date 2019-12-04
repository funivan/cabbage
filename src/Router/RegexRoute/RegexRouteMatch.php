<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\RegexRoute;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObject;
use Funivan\CabbageCore\Router\Match\Result\FailedMatchResult;
use Funivan\CabbageCore\Router\Match\Result\MatchResult;
use Funivan\CabbageCore\Router\Match\Result\MatchResultInterface;
use Funivan\CabbageCore\Router\Match\RouteMatchInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 *
 */
class RegexRouteMatch implements RouteMatchInterface
{

    /**
     * @var string
     */
    private $regex;


    /**
     * @param string $regex
     */
    public function __construct(string $regex)
    {
        $this->regex = $regex;
    }


    /**
     * @param ServerRequestInterface $request
     * @return MatchResultInterface
     */
    final public function match(ServerRequestInterface $request): MatchResultInterface
    {
        $path = $request->getUri()->getPath();
        $matched = (preg_match('!^' . $this->regex . '$!', $path, $params) === 1);
        if ($matched) {
            foreach ((array)$params as $index => $param) {
                if (is_numeric($index)) {
                    unset($params[$index]);
                }
            }
            $result = MatchResult::create(true, new ArrayObject($params));
        } else {
            $result = new FailedMatchResult();
        }
        return $result;
    }
}
