<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Http\Tests\Response\Headers;

use Funivan\CabbageCore\Http\Response\Headers\Exceptions\OverwriteHeaderFieldException;
use Funivan\CabbageCore\Http\Response\Headers\Field;
use Funivan\CabbageCore\Http\Response\Headers\Headers;
use PHPUnit\Framework\TestCase;

/**
 * @codeCoverageIgnore
 */
final class HeadersTest extends TestCase
{


    public function testMerge(): void
    {
        self::assertCount(2,
            (new Headers([new Field('Set-Cookie', 'User=1')]))
                ->merge(new Headers([new Field('Location', '/')]))
                ->fields()
        );
    }


    public function testHasFailure() : void
    {
        self::assertFalse((new Headers([]))->has('Set-Cookie'));
    }


    public function testHasSuccess() : void
    {
        self::assertTrue((new Headers([new Field('Location', '/')]))->has('Location'));
    }


    public function testGet() : void
    {
        self::assertSame('/test.com',
            (new Headers([new Field('Location', '/test.com')]))->field('Location')->value()
        );
    }


    public function testOverwriteExistingVariable() : void
    {
        $this->expectException(OverwriteHeaderFieldException::class);
        $this->expectExceptionMessage('Header field Location is already defined');
        (new Headers(
            [new Field('Location', 'test.com')])
        )->merge(
            new Headers([new Field('Location', '/')])
        );
    }


}
