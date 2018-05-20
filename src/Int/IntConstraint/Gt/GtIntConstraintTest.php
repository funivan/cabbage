<?php

namespace Funivan\CabbageCore\Int\IntConstraint\Gt;

use PHPUnit\Framework\TestCase;

class GtIntConstraintTest extends TestCase
{
    public function testValid()
    {
        self::assertFalse(
            (new GtIntConstraint(5))->valid(4)
        );
    }
}
