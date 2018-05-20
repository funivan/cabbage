<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\String\StringObject\Random;

use Funivan\CabbageCore\String\StringList\StringListInterface;
use Funivan\CabbageCore\String\StringObject\StringInterface;

class RandomString implements StringInterface
{
    /**
     * @var StringListInterface
     */
    private $list;

    public function __construct(StringListInterface $list)
    {
        $this->list = $list;
    }

    public function value(): string
    {
        $items = \iterator_to_array($this->list->all());
        shuffle($items);
        $result = reset($items);
        if (!is_string($result)) {
            throw new \RuntimeException('Can not fetch random string from the list');
        }
        return $result;
    }
}
