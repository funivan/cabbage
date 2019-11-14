<?php

namespace Funivan\CabbageCore\Float\FloatObject;

use PHPUnit\Framework\TestCase;

final class PredefinedFloatTest extends TestCase
{
    public function testValue(): void
    {
        self::assertSame(
            12.44,
            (new PredefinedFloat(12.44))->value()
        );
    }
}
