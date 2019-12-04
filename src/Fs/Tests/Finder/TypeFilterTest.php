<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Fs\Tests\Finder;

use Funivan\CabbageCore\Fs\FileStorageInterface;
use Funivan\CabbageCore\Fs\Finder\FilteredByTypeFilesList;
use Funivan\CabbageCore\Fs\Fs\Local\LocalPath;
use Funivan\CabbageCore\Fs\Fs\Memory\MemoryStorage;
use PHPUnit\Framework\TestCase;

final class TypeFilterTest extends TestCase
{
    public function testDirectory(): void
    {
        $fs = new MemoryStorage();
        $fs->write(new LocalPath('/test.php'), 'test');
        $fs->write(new LocalPath('/test/a.php'), 'a');
        $fs->write(new LocalPath('/data/b.php'), 'b');
        $fs->write(new LocalPath('/user/c.php'), 'c');
        $items = iterator_to_array(
            (new FilteredByTypeFilesList(
                FileStorageInterface::TYPE_DIRECTORY,
                $fs,
                $fs->finder(new LocalPath('/'))
            ))
                ->items()
        );
        self::assertCount(3, $items);
    }
}
