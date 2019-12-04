<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\PathRoute;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObject;
use Funivan\CabbageCore\Router\Match\Result\FailedMatchResult;
use Funivan\CabbageCore\Router\Match\Result\MatchResult;
use Funivan\CabbageCore\Router\Match\Result\MatchResultInterface;
use Funivan\CabbageCore\Router\Match\RouteMatchInterface;
use Psr\Http\Message\ServerRequestInterface;

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
     * @param ServerRequestInterface $request
     * @return MatchResultInterface
     */
    final public function match(ServerRequestInterface $request): MatchResultInterface
    {
        $path = $request->getUri()->getPath();
        if ($path === $this->path) {
            $result = MatchResult::create(true, new ArrayObject([]));
        } else {
            $result = new FailedMatchResult();
        }
        return $result;
    }
}
