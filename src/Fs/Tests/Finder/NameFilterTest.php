<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Fs\Tests\Finder;

use Funivan\CabbageCore\Fs\Finder\InMemoryPathFinder;
use Funivan\CabbageCore\Fs\Finder\NameFilter;
use Funivan\CabbageCore\Fs\Fs\Local\LocalPath;
use PHPUnit\Framework\TestCase;

final class NameFilterTest extends TestCase
{

    public function testMathSuccess() : void
    {
        $filter = new NameFilter(
            '![a-z]+\.txt$!',
            new InMemoryPathFinder(
                [
                    '/test/a.txt',
                    '/test/c1.txt',
                ],
                new LocalPath('/test')
            )
        );
        self::assertSame(
            1,
            iterator_count($filter->items())
        );
    }
}
