<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Fs\Finder;

use EmptyIterator;
use Funivan\CabbageCore\Fs\PathInterface;
use Iterator;

/**
 *
 */
class EmptyFinder implements FinderInterface
{

    /**
     * @return PathInterface[]|Iterator
     */
    final public function items(): Iterator
    {
        return new EmptyIterator();
    }
}
