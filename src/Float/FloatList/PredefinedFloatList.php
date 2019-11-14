<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Float\FloatList;

class PredefinedFloatList implements FloatListInterface
{
    /**
     * @var float[]
     */
    private $items;

    public function __construct(float ...$items)
    {
        $this->items = $items;
    }

    /**
     * @return float[]|iterable
     */
    final public function getIterator(): iterable
    {
        yield from $this->items;
    }
}
