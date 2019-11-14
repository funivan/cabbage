<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Int\IntObject;

class PredefinedInt implements IntInterface
{

    /**
     * @var int
     */
    private $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    final public function toInt(): int
    {
        return $this->value;
    }
}
