<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\String\StringList\Combined;

use Funivan\CabbageCore\String\StringList\StringListInterface;

/**
 * In some cases we can not use CompositeStringList because of huge nested level
 * We need to use imperative style and merge items int __construct.
 */
class CombinedStringList implements StringListInterface
{

    /**
     * @var string[]
     */
    private $values;


    public function __construct(StringListInterface ...$items)
    {
        $values = [];
        foreach ($items as $item) {
            /** @noinspection SlowArrayOperationsInLoopInspection */
            $values = array_merge($values, iterator_to_array($item));
        }
        $this->values = $values;
    }


    /**
     * @return string[]|iterable
     */
    final public function getIterator(): iterable
    {
        yield from $this->values;
    }
}
