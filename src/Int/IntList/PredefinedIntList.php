<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Int\IntList;

class PredefinedIntList implements IntListInterface
{
    /**
     * @var int[]
     */
    private $values;

    /**
     */
    public function __construct(int ...$values)
    {
        $this->values = $values;
    }

    /**
     * @return int[]|iterable
     */
    final public function getIterator(): iterable
    {
        yield from $this->values;
    }
}
