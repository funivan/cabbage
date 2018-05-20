<?php

namespace Funivan\CabbageCore\String\StringConstraint\Regex;

use PHPUnit\Framework\TestCase;

class RegexStringConstraintTest extends TestCase
{
    public function testValid() : void
    {
        self::assertTrue(
            (new RegexStringConstraint('!\d+!'))->valid('afa1233')
        );
    }
}
