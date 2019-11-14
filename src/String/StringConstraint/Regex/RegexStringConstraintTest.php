<?php

namespace Funivan\CabbageCore\String\StringConstraint\Regex;

use PHPUnit\Framework\TestCase;

final class RegexStringConstraintTest extends TestCase
{
    public function testValid(): void
    {
        self::assertTrue(
            (new RegexStringConstraint('!\d+!'))->valid('afa1233')
        );
    }
}
