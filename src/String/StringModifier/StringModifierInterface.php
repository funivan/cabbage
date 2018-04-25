<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\String\StringModifier;

interface StringModifierInterface
{
    public function modify(string $input): string;
}
