<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Fs\File;

use Funivan\CabbageCore\Fs\FileStorageInterface;
use Funivan\CabbageCore\Fs\Fs\Local\LocalPath;
use Funivan\CabbageCore\Fs\Fs\Memory\MemoryStorage;
use Funivan\CabbageCore\Fs\PathInterface;

/**
 *
 */
class File implements FileInterface
{

    /**
     * @var PathInterface
     */
    private $path;

    /**
     * @var FileStorageInterface
     */
    private $storage;


    /**
     * @param PathInterface $path
     * @param FileStorageInterface $storage
     */
    public function __construct(PathInterface $path, FileStorageInterface $storage)
    {
        $this->path = $path;
        $this->storage = $storage;
    }


    /**
     * @param string $content
     * @return FileInterface
     */
    public static function createInMemory(string $content = ''): FileInterface
    {
        $file = new self(new LocalPath('/memory.txt'), new MemoryStorage());
        $file->write($content);
        return $file;
    }

    /**
     * Write content to the file
     *
     * @param string $content
     * @return void
     */
    final public function write(string $content): void
    {
        $this->storage->write($this->path, $content);
    }

    /**
     * @param PathInterface $path
     * @param FileStorageInterface $storage
     * @return FileInterface
     */
    public static function create(PathInterface $path, FileStorageInterface $storage): FileInterface
    {
        return new self($path, $storage);
    }

    /**
     * Return content of the file
     *
     * @return string
     */
    final public function read(): string
    {
        return $this->storage->read($this->path);
    }

    /**
     * @return bool
     */
    final public function exists(): bool
    {
        return FileStorageInterface::TYPE_FILE === $this->storage->type($this->path);
    }

    /**
     * @return void
     */
    final public function remove(): void
    {
        $this->storage->remove($this->path);
    }

    /**
     * @param string $type
     * @return string
     */
    final public function meta(string $type): string
    {
        return $this->storage->meta($this->path, $type);
    }

    /**
     * @param PathInterface $path
     * @return FileInterface
     */
    final public function move(PathInterface $path): FileInterface
    {
        $this->storage->move($this->path(), $path);
        return new self($path, $this->storage);
    }

    /**
     * @return PathInterface
     */
    final public function path(): PathInterface
    {
        return $this->path;
    }
}
