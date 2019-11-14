<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Fs\Fs\Local\FsIterator;

use DirectoryIterator;
use Funivan\CabbageCore\Fs\Finder\FinderInterface;
use Funivan\CabbageCore\Fs\Fs\Local\LocalPath;
use Funivan\CabbageCore\Fs\PathInterface;
use Iterator;


class LocalFsFinder implements FinderInterface
{

    /**
     * @var PathInterface
     */
    private $searchPath;

    /**
     * @var DirectoryIterator
     */
    private $iterator;


    /**
     * @param PathInterface $basePath
     * @param PathInterface $searchPath
     */
    public function __construct(PathInterface $basePath, PathInterface $searchPath)
    {
        $fullSearchPath = $basePath;
        if (!$searchPath->isRoot()) {
            $fullSearchPath = $fullSearchPath->next($searchPath);
        }
        $this->iterator = new DirectoryIterator($fullSearchPath->assemble());
        $this->searchPath = $searchPath;
    }


    /**
     * @return PathInterface[]|Iterator
     */
    final public function items(): Iterator
    {
        foreach ($this->iterator as $item) {
            assert($item instanceof DirectoryIterator);
            if (!$item->isDot()) {
                yield $this->searchPath->next(new LocalPath($item->getFilename()));
            }
        }
    }

}
