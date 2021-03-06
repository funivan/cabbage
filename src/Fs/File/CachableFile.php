<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Fs\File;

use Funivan\CabbageCore\DataStructures\BufferedString\BufferedString;
use Funivan\CabbageCore\DataStructures\BufferedString\BufferedStringInterface;
use Funivan\CabbageCore\Fs\PathInterface;

/**
 *
 */
class CachableFile implements FileInterface
{

    /**
     * @var FileInterface
     */
    private $original;

    /**
     * @var BufferedStringInterface
     */
    private $content;


    /**
     * @param $original
     */
    public function __construct(FileInterface $original)
    {
        $this->original = $original;
        $this->content = new BufferedString();
    }


    /**
     * @return string
     */
    final public function read(): string
    {
        if ($this->content->empty()) {
            $this->content->append($this->original->read());
        }
        return $this->content->read();
    }


    /**
     * We can go deeper and even cache exists call
     *
     * @return bool
     */
    final public function exists(): bool
    {
        return $this->original->exists();
    }


    /**
     * Remove original file and content from the memory
     *
     * @return void
     */
    final public function remove(): void
    {
        $this->original->remove();
        $this->content->clear();
    }


    /**
     * @param string $content
     * @return void
     */
    final public function write(string $content): void
    {
        $this->original->write($content);
        $this->content->clear()->append($content);
    }


    /**
     * @param string $type
     * @return string
     */
    final public function meta(string $type): string
    {
        return $this->original->meta($type);
    }


    /**
     * @return PathInterface
     */
    final public function path(): PathInterface
    {
        return $this->original->path();
    }


    /**
     * @param PathInterface $path
     * @return FileInterface
     */
    final public function move(PathInterface $path): FileInterface
    {
        return $this->original->move($path);
    }
}
