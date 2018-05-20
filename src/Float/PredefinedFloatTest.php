<?php

namespace Funivan\CabbageCore\Float;

use PHPUnit\Framework\TestCase;

class PredefinedFloatTest extends TestCase
{
    public function testValue(): void
    {
        self::assertSame(
            12.44,
            (new PredefinedFloat(12.44))->value()
        );
    }
}
