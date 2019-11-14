<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router;

use Funivan\CabbageCore\Dispatcher\DispatcherInterface;
use Funivan\CabbageCore\Http\Request\RequestInterface;
use Funivan\CabbageCore\Http\Response\ResponseInterface;
use Funivan\CabbageCore\Router\Match\Result\MatchResultInterface;
use Funivan\CabbageCore\Router\Match\RouteMatchInterface;

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


    final public function handle(RequestInterface $request): ResponseInterface
    {
        return $this->dispatcher->handle($request);
    }


    final public function match(RequestInterface $request): MatchResultInterface
    {
        return $this->matcher->match($request);
    }

}