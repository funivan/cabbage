<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router;

use Funivan\CabbageCore\Dispatcher\DispatcherInterface;
use Funivan\CabbageCore\Http\Response\ResponseInterface;
use Funivan\CabbageCore\Router\Match\Result\MatchResultInterface;
use Funivan\CabbageCore\Router\Match\RouteMatchInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 *
 */
class Route implements RouteInterface
{

    /**
     * @var RouteMatchInterface
     */
    private $matcher;

    /**
     * @var DispatcherInterface
     */
    private $dispatcher;


    public function __construct(RouteMatchInterface $match, DispatcherInterface $dispatcher)
    {
        $this->matcher = $match;
        $this->dispatcher = $dispatcher;
    }


    final public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->dispatcher->handle($request);
    }


    final public function match(ServerRequestInterface $request): MatchResultInterface
    {
        return $this->matcher->match($request);
    }
}
