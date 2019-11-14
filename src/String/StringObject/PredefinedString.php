<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\String\StringObject;

class PredefinedString implements StringInterface
{

    /**
     * @var string
     */
    private $value;


    public function __construct(string $name)
    {
        $this->value = $name;
    }


    final public function toString(): string
    {
        return $this->value;
    }
}
