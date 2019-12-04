<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Router\PathMethod;

use Funivan\CabbageCore\Dispatcher\DispatcherInterface;
use Funivan\CabbageCore\Router\Match\Result\FailedMatchResult;
use Funivan\CabbageCore\Router\Match\Result\MatchResult;
use Funivan\CabbageCore\Router\Match\Result\MatchResultInterface;
use Funivan\CabbageCore\Router\RouteInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class PathMethodRoute implements RouteInterface
{
    /**
     * @var string
     */
    private $path;
    /**
     * @var string
     */
    private $method;
    /**
     * @var DispatcherInterface
     */
    private $next;

    public function __construct(string $path, string $method, DispatcherInterface $next)
    {
        $this->path = $path;
        $this->method = $method;
        $this->next = $next;
    }

    /**
     * @inheritDoc
     */
    final public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->next->handle($request);
    }

    /**
     * @inheritDoc
     */
    final public function match(ServerRequestInterface $request): MatchResultInterface
    {
        $path = $request->getUri()->getPath();
        $result = new FailedMatchResult();
        if ($this->path === $path && $this->method === $request->getMethod()) {
            $result = MatchResult::createSuccess();
        }
        return $result;
    }
}
