<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Http\Tests\Request\Cookie;

use Funivan\CabbageCore\Http\Request\Cookie\RequestCookies;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class RequestCookiesTest extends TestCase
{
    public function testCreateFromRaw() : void
    {
        self::assertSame(
            '123',
            RequestCookies::createFromRaw(['login_uid' => '123'])
                ->get('login_uid')->value()
        );
    }


    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Can not retrieve cookie login
     */
    public function testRetrieveInvalidCookie() : void
    {
        RequestCookies::createFromRaw(['name' => 'UserName'])->get('login');
    }
}
