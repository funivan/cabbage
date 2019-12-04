<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Dispatcher\Tests;

use Funivan\CabbageCore\Dispatcher\App;
use Funivan\CabbageCore\Dispatcher\StaticDispatcher;
use Funivan\CabbageCore\Http\Response\Headers\Field;
use Funivan\CabbageCore\Http\Response\Headers\Headers;
use Funivan\CabbageCore\Http\Response\Plain\PlainResponse;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;

/**
 * @codeCoverageIgnore
 */
final class AppTest extends TestCase
{

    /**
     * @runInSeparateProcess
     */
    public function testSendResponse(): void
    {
        $app = new App(
            new StaticDispatcher(
                PlainResponse::createWithHeaders(
                    'custom body text',
                    new Headers([new Field('X-User-Time', '1489')])
                )
            )
        );
        $request = new ServerRequest('GET', '/');
        ob_start();
        $app->run($request);
        $body = ob_get_clean();
        self::assertSame('custom body text', $body);
        if (function_exists('xdebug_get_headers')) {
            /** @noinspection ForgottenDebugOutputInspection */
            /** @noinspection PhpComposerExtensionStubsInspection */
            self::assertSame(['X-User-Time: 1489'], xdebug_get_headers());
        }
    }
}
