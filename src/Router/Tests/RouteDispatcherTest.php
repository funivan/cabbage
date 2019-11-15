<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Router\Tests;

use Funivan\CabbageCore\DataStructures\Stack\StringStack;
use Funivan\CabbageCore\Dispatcher\DispatcherInterface;
use Funivan\CabbageCore\Http\Request\Cookie\RequestCookies;
use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObject;
use Funivan\CabbageCore\Http\Request\Request;
use Funivan\CabbageCore\Http\Request\RequestInterface;
use Funivan\CabbageCore\Http\Response\Body\BufferedBody;
use Funivan\CabbageCore\Http\Response\Plain\PlainResponse;
use Funivan\CabbageCore\Http\Response\ResponseInterface;
use Funivan\CabbageCore\Router\Match\Result\MatchResult;
use Funivan\CabbageCore\Router\Match\Result\MatchResultInterface;
use Funivan\CabbageCore\Router\Match\RouteMatchInterface;
use Funivan\CabbageCore\Router\Route;
use Funivan\CabbageCore\Router\RouterDispatcher;
use PHPUnit\Framework\TestCase;

/**
 * @codeCoverageIgnore
 */
final class RouteDispatcherTest extends TestCase
{

    public function testPassCustomParametersOnMatch(): void
    {
        $routeMatch = new class implements RouteMatchInterface {
            final public function match(RequestInterface $request): MatchResultInterface
            {
                return MatchResult::create(true, new ArrayObject(['id' => $request->get()->value('formId')]));
            }
        };
        $dispatcher = new class implements DispatcherInterface {
            final public function handle(RequestInterface $request): ResponseInterface
            {
                return PlainResponse::create(
                    sprintf('Form Submitted: %s', $request->parameters()->value('id'))
                );
            }
        };

        $routeDispatcher = new RouterDispatcher([new Route($routeMatch, $dispatcher)]);
        $response = $routeDispatcher->handle(
            new Request(
                new ArrayObject(['formId' => '123']),
                new ArrayObject([]),
                new ArrayObject([]),
                new ArrayObject([]),
                RequestCookies::create([])
            )
        );

        $stack = new StringStack();
        (new BufferedBody($response->body(), $stack))->send();
        self::assertSame('Form Submitted: 123', $stack->pop());
    }
}
