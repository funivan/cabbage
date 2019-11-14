<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\String\StringList\Composite;

use Funivan\CabbageCore\String\StringList\StringListInterface;

class CompositeStringList implements StringListInterface
{

    /**
     * @var StringListInterface[]
     */
    private $items;


    public function __construct(StringListInterface ...$items)
    {
        $this->items = $items;
    }

    /**
     * @return string[]|iterable
     */
    final public function getIterator(): iterable
    {
        foreach ($this->items as $item) {
            foreach ($item->getIterator() as $value) {
                yield $value;
            }
        }
    }
}
