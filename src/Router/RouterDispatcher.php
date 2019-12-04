<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router;

use Exception;
use Funivan\CabbageCore\Dispatcher\DispatcherInterface;
use Funivan\CabbageCore\Http\Response\ResponseInterface;
use Funivan\CabbageCore\Router\Exception\RouteNotFoundException;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Iterate over all routes
 *  if route match
 *    - then forward request to the route dispatcher
 * Throw exception if all routes does not correspond to the client request
 */
class RouterDispatcher implements DispatcherInterface
{

    /**
     * @var RouteInterface[]
     */
    private $routes;


    /**
     * @param RouteInterface[] $routes
     */
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }


    /**
     *
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     * @throws Exception
     */
    final public function handle(ServerRequestInterface $request): ResponseInterface
    {
        foreach ($this->routes as $route) {
            $matchResult = $route->match($request);
            if ($matchResult->matched()) {
                foreach ($matchResult->parameters()->toArray() as $name => $value) {
                    $request = $request->withAttribute($name, $value);
                }
                return $route->handle($request);
            }
        }
        throw new RouteNotFoundException(
            sprintf('Route not found. Number of routes: %s', count($this->routes))
        );
    }
}
