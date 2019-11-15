<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Fs\Tests\File;

use Funivan\CabbageCore\Fs\File\File;
use Funivan\CabbageCore\Fs\Fs\Local\LocalPath;
use Funivan\CabbageCore\Fs\Fs\Memory\MemoryStorage;
use PHPUnit\Framework\TestCase;

/**
 * @codeCoverageIgnore
 */
final class FileTest extends TestCase
{
    public function testSuccessfulContentRead(): void
    {
        $storage = new MemoryStorage();
        $storage->write(new LocalPath('/test/custom/file.txt'), 'file content');
        $file = File::create(new LocalPath('/test/custom/file.txt'), $storage);
        self::assertSame('file content', $file->read());
    }
}
