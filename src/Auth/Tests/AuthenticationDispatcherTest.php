<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Auth\Tests;

use Funivan\CabbageCore\Auth\AuthenticationDispatcher;
use Funivan\CabbageCore\Auth\Tests\Fixtures\DummyAuthComponent;
use Funivan\CabbageCore\Auth\Tests\Fixtures\DummyUser;
use Funivan\CabbageCore\Dispatcher\StaticDispatcher;
use Funivan\CabbageCore\Http\Request\Cookie\RequestCookies;
use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObject;
use Funivan\CabbageCore\Http\Request\Request;
use Funivan\CabbageCore\Http\Response\Redirect\RedirectResponse;
use Funivan\CabbageCore\Router\PathRoute\PathUrl;
use PHPUnit\Framework\TestCase;

/**
 * @codeCoverageIgnore
 */
final class AuthenticationDispatcherTest extends TestCase
{

    public function testDispatch() : void
    {
        $dispatcher = new AuthenticationDispatcher(
            new DummyAuthComponent(new DummyUser(DummyUser::ANONYMOUS)),
            new StaticDispatcher(new RedirectResponse(new PathUrl('/login', new ArrayObject([])), 302)),
            new StaticDispatcher(
                new RedirectResponse(new PathUrl('/my/login.page', new ArrayObject([])), 302)
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
            '/login',
            $dispatcher->handle($request)->headers()->field('Location')->value()
        );
    }
}
