<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Auth\Tests;

use Funivan\CabbageCore\Auth\AuthorizationDispatcher;
use Funivan\CabbageCore\Auth\Tests\Fixtures\DummyAuthComponent;
use Funivan\CabbageCore\Auth\Tests\Fixtures\DummyUser;
use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObject;
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
final class AuthorizationDispatcherTest extends TestCase
{
    public function testHasAccess() : void
    {
        $authorization = new AuthorizationDispatcher(
            'edit_photo',
            new DummyAuthComponent(
                new DummyUser('123', '123', ['edit_photo'])
            ),
            new StaticDispatcher(
                PlainResponse::createWithHeaders(
                    'authorized',
                    new Headers([
                        new Field('Location', '/authorized/zone'),
                    ])
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
        self::assertSame(
            '/authorized/zone',
            $authorization->handle($request)->headers()->field('Location')->value()
        );
    }
}
