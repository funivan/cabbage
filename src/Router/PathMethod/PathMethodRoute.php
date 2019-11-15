<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Router\PathMethod;

use Funivan\CabbageCore\Dispatcher\DispatcherInterface;
use Funivan\CabbageCore\Http\Request\RequestInterface;
use Funivan\CabbageCore\Http\Response\ResponseInterface;
use Funivan\CabbageCore\Router\Match\Result\FailedMatchResult;
use Funivan\CabbageCore\Router\Match\Result\MatchResult;
use Funivan\CabbageCore\Router\Match\Result\MatchResultInterface;
use Funivan\CabbageCore\Router\RouteInterface;

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
    final public function handle(RequestInterface $request): ResponseInterface
    {
        return $this->next->handle($request);
    }

    /**
     * @inheritDoc
     */
    final public function match(RequestInterface $request): MatchResultInterface
    {
        $server = $request->server()->toArray();
        $path = (string)($server['REQUEST_URI'] ?? '');
        if (false !== $pos = strpos($path, '?')) {
            $path = substr($path, 0, $pos);
        }
        $path = rawurldecode($path);
        $result = new FailedMatchResult();
        if ($path === $this->path) {
            $method = $server['REQUEST_METHOD'] ?? null;
            if ($method === $this->method) {
                $result = MatchResult::createSuccess();
            }
        }
        return $result;
    }
}
