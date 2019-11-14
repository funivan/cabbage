<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\String\StringList;

use IteratorAggregate;

interface StringListInterface extends IteratorAggregate
{

    /**
     * @return string[]|iterable
     */
    public function getIterator(): iterable;
}
