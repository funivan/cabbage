<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Float;

class PredefinedFloat implements FloatInterface
{
    /**
     * @var float
     */
    private $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function value(): float
    {
        return $this->value;
    }
}
