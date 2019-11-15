<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Fs\Finder;

use Funivan\CabbageCore\Fs\FileStorageInterface;
use Funivan\CabbageCore\Fs\PathInterface;
use Iterator;

/**
 *
 */
class FilteredByTypeFilesList implements FinderInterface
{

    /**
     * @var FinderInterface
     */
    private $original;

    /**
     * @var string
     */
    private $type;

    /**
     * @var FileStorageInterface
     */
    private $storage;


    /**
     * @param string $type
     * @param FileStorageInterface $storage
     * @param FinderInterface $original
     */
    public function __construct(string $type, FileStorageInterface $storage, FinderInterface $original)
    {
        $this->original = $original;
        $this->type = $type;
        $this->storage = $storage;
    }


    /**
     * @return PathInterface[]|Iterator
     */
    final public function items(): Iterator
    {
        foreach ($this->original->items() as $item) {
            if ($this->storage->type($item) === $this->type) {
                yield $item;
            }
        }
    }
}
