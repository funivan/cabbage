<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Int\IntConstraint;

interface IntConstraintInterface
{
    public function valid(int $value): bool;
}
