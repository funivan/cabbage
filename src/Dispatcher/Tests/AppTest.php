<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Dispatcher\Tests;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObject;
use Funivan\CabbageCore\Dispatcher\App;
use Funivan\CabbageCore\Dispatcher\StaticDispatcher;
use Funivan\CabbageCore\Http\Request\Cookie\RequestCookies;
use Funivan\CabbageCore\Http\Request\Request;
use Funivan\CabbageCore\Http\Response\Headers\Field;
use Funivan\CabbageCore\Http\Response\Headers\Headers;
use Funivan\CabbageCore\Http\Response\Plain\PlainResponse;
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
        $request = new Request(
            new ArrayObject([]),
            new ArrayObject([]),
            new ArrayObject([]),
            new ArrayObject([]),
            RequestCookies::create([])
        );
        ob_start();
        $app->run($request);
        $body = ob_get_clean();
        self::assertSame('custom body text', $body);
        if (function_exists('xdebug_get_headers')) {
            /** @noinspection PhpComposerExtensionStubsInspection */
            self::assertSame(['X-User-Time: 1489'], xdebug_get_headers());
        }
    }
}
