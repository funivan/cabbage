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
     * @return float[]|\Generator
     */
    public function all(): \Generator
    {
        yield from $this->items;
    }
}
