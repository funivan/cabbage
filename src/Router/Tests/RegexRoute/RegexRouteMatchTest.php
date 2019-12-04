<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Router\Tests\RegexRoute;

use Funivan\CabbageCore\Router\RegexRoute\RegexRouteMatch;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;

final class RegexRouteMatchTest extends TestCase
{
    public function testMatchSuccess(): void
    {
        $request = new ServerRequest('GET', '/test.php');
        self::assertTrue(
            (new RegexRouteMatch('/test\.php'))->match($request)->matched()
        );
    }
}
