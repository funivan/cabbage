<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\String\StringList\Unique;

use Funivan\CabbageCore\String\StringList\StringListInterface;

class UniqueStringList implements StringListInterface
{

    /**
     * @var StringListInterface
     */
    private $original;


    public function __construct(StringListInterface $original)
    {
        $this->original = $original;
    }


    /**
     * @return string[]|\Generator
     */
    public function all(): \Generator
    {
        yield from array_values(
            array_unique(
                iterator_to_array($this->original->all())
            )
        );
    }
}
