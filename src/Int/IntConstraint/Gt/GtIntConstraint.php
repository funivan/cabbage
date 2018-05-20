<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Int\IntConstraint\Gt;

use Funivan\CabbageCore\Int\IntConstraint\IntConstraintInterface;

class GtIntConstraint implements IntConstraintInterface
{


    /**
     * @var int
     */
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function valid(int $value): bool
    {
        return $value > $this->value;
    }
}
