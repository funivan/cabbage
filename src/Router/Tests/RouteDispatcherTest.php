<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Router\Tests;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObject;
use Funivan\CabbageCore\DataStructures\Stack\StringStack;
use Funivan\CabbageCore\Dispatcher\DispatcherInterface;
use Funivan\CabbageCore\Http\Response\Body\BufferedBody;
use Funivan\CabbageCore\Http\Response\Plain\PlainResponse;
use Funivan\CabbageCore\Http\Response\ResponseInterface;
use Funivan\CabbageCore\Router\Match\Result\MatchResult;
use Funivan\CabbageCore\Router\Match\Result\MatchResultInterface;
use Funivan\CabbageCore\Router\Match\RouteMatchInterface;
use Funivan\CabbageCore\Router\Route;
use Funivan\CabbageCore\Router\RouterDispatcher;
use GuzzleHttp\Psr7\ServerRequest;
use GuzzleHttp\Psr7\Uri;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @codeCoverageIgnore
 */
final class RouteDispatcherTest extends TestCase
{
    public function testPassCustomParametersOnMatch(): void
    {
        $routeMatch = new class implements RouteMatchInterface {
            final public function match(ServerRequestInterface $request): MatchResultInterface
            {
                /** @noinspection PhpComposerExtensionStubsInspection */
                $data = (array)json_decode($request->getBody()->getContents(), true);
                return MatchResult::create(
                    true,
                    new ArrayObject(['id' => $data['formId']])
                );
            }
        };
        $dispatcher = new class implements DispatcherInterface {
            final public function handle(ServerRequestInterface $request): ResponseInterface
            {
                return PlainResponse::create(
                    sprintf('Form Submitted: %s', $request->getAttribute('id'))
                );
            }
        };
        $response = (new RouterDispatcher([new Route($routeMatch, $dispatcher)]))
            ->handle(
                new ServerRequest(
                    'POST',
                    new Uri('/'),
                    [],
                    '{"formId":"123"}'
                )
            );

        $stack = new StringStack();
        (new BufferedBody($response->body(), $stack))->send();
        self::assertSame('Form Submitted: 123', $stack->pop());
    }
}
