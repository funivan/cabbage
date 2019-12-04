<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Int\ListSize;

use function count;
use Funivan\CabbageCore\Int\IntObject\IntInterface;
use function iterator_to_array;
use IteratorAggregate;

class ListSize implements IntInterface
{
    /**
     * @var IteratorAggregate
     */
    private $list;

    public function __construct(IteratorAggregate $list)
    {
        $this->list = $list;
    }

    final public function toInt(): int
    {
        return count(iterator_to_array($this->list));
    }
}
