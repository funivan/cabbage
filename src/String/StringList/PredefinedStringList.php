<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\String\StringList;

class PredefinedStringList implements StringListInterface
{


    /**
     * @var string[]
     */
    private $items;


    public function __construct(string ...$items)
    {
        $this->items = $items;
    }


    /**
     * @return string[]|iterable
     */
    final public function getIterator(): iterable
    {
        yield from $this->items;
    }
}
