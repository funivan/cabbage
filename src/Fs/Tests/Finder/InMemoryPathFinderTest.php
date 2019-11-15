<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Fs\Tests\Finder;

use Funivan\CabbageCore\Fs\Finder\InMemoryPathFinder;
use Funivan\CabbageCore\Fs\Fs\Local\LocalPath;
use PHPUnit\Framework\TestCase;

final class InMemoryPathFinderTest extends TestCase
{
    public function testMatch() : void
    {
        $finder = new InMemoryPathFinder(
            [
                '/a/user.txt',
                '/a/data.txt',
            ],
            new LocalPath('/')
        );
        self::assertSame(1, iterator_count($finder->items()));
    }
}
