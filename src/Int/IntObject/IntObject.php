<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Int\IntObject;

class IntObject implements IntInterface
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

    public function value(): int
    {
        return $this->value;
    }
}
