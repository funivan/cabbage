<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Router\Tests\RegexRoute;

use Funivan\CabbageCore\Http\Request\Cookie\RequestCookies;
use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObject;
use Funivan\CabbageCore\Http\Request\Request;
use Funivan\CabbageCore\Router\RegexRoute\RegexRouteMatch;
use PHPUnit\Framework\TestCase;

final class RegexRouteMatchTest extends TestCase
{


    public function testMatchSuccess() : void
    {
        $request = new Request(
            new ArrayObject([]),
            new ArrayObject([]),
            new ArrayObject([
                'PATH_INFO' => '/test.php'
            ]),
            new ArrayObject([]),
            RequestCookies::create([])
        );
        self::assertTrue(
            (new RegexRouteMatch('/test\.php'))->match($request)->matched()
        );
    }
}
