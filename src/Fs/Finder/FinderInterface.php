<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Fs\Finder;

use Funivan\CabbageCore\Fs\PathInterface;
use Iterator;

/**
 *
 */
interface FinderInterface
{

    /**
     * @return PathInterface[]|Iterator
     */
    public function items(): Iterator;
}
