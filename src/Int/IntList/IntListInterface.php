<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Int\IntList;

use IteratorAggregate;

interface IntListInterface extends IteratorAggregate
{

    /**
     * @return int[]|iterable
     */
    public function getIterator(): iterable;
}
