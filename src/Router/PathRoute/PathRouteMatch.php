<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\PathRoute;

use Funivan\CabbageCore\Http\Request\Parameters;
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
        if ($request->server()->value('PATH_INFO') === $this->path) {
            $result = MatchResult::create(true, new Parameters([]));
        } else {
            $result = new FailedMatchResult();
        }
        return $result;
    }

}