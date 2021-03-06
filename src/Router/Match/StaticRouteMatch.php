<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\Match;

use Funivan\CabbageCore\Router\Match\Result\MatchResultInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 *
 */
class StaticRouteMatch implements RouteMatchInterface
{

    /**
     * @var MatchResultInterface
     */
    private $result;


    /**
     * @param MatchResultInterface $result
     */
    public function __construct(MatchResultInterface $result)
    {
        $this->result = $result;
    }


    /**
     * @param ServerRequestInterface $request
     * @return MatchResultInterface
     */
    final public function match(ServerRequestInterface $request): MatchResultInterface
    {
        return $this->result;
    }
}
