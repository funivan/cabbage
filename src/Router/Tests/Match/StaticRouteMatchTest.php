<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Router\Tests\Match;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObject;
use Funivan\CabbageCore\Http\Request\Cookie\RequestCookies;
use Funivan\CabbageCore\Http\Request\Request;
use Funivan\CabbageCore\Router\Match\Result\MatchResult;
use Funivan\CabbageCore\Router\Match\StaticRouteMatch;
use PHPUnit\Framework\TestCase;

final class StaticRouteMatchTest extends TestCase
{
    public function testMatch() : void
    {
        $request = new Request(
            new ArrayObject([]),
            new ArrayObject([]),
            new ArrayObject([]),
            new ArrayObject([]),
            RequestCookies::create([])
        );
        self::assertTrue(
            (new StaticRouteMatch(MatchResult::create(true, new ArrayObject([]))))
                ->match($request)->matched()
        );
    }
}
