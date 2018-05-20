<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\String\StringConstraint;

interface StringConstraintInterface
{
    public function valid(string $string): bool;
}
