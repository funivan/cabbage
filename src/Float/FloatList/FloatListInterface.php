<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Float\FloatList;

use IteratorAggregate;

interface FloatListInterface extends IteratorAggregate
{

    /**
     * @return float[]|iterable
     */
    public function getIterator(): iterable;
}
