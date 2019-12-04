<?php

namespace Funivan\CabbageCore\Int\IntConstraint\Gt;

use PHPUnit\Framework\TestCase;

final class GtIntConstraintTest extends TestCase
{
    public function testValid(): void
    {
        self::assertFalse(
            (new GtIntConstraint(5))->valid(4)
        );
    }
}
