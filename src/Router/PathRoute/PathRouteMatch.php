<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\PathRoute;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObject;
use Funivan\CabbageCore\Http\Request\RequestInterface;
use Funivan\CabbageCore\Router\Match\Result\FailedMatchResult;
use Funivan\CabbageCore\Router\Match\Result\MatchResult;
use Funivan\CabbageCore\Router\Match\Result\MatchResultInterface;
use Funivan\CabbageCore\Router\Match\RouteMatchInterface;

/**
 *
 */
class PathRouteMatch implements RouteMatchInterface
{

    /**
     * @var string
     */
    private $path;


    /**
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }


    /**
     * @param RequestInterface $request
     * @return MatchResultInterface
     */
    final public function match(RequestInterface $request): MatchResultInterface
    {
        $path = $request->server()->toArray()['PATH_INFO'] ?? null;
        if ($path === $this->path) {
            $result = MatchResult::create(true, new ArrayObject([]));
        } else {
            $result = new FailedMatchResult();
        }
        return $result;
    }

}