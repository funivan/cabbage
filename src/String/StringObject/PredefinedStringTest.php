<?php

namespace Funivan\CabbageCore\String\StringObject;

use PHPUnit\Framework\TestCase;

final class PredefinedStringTest extends TestCase
{
    public function testValue(): void
    {
        self::assertSame(
            'val',
            (new PredefinedString('val'))->toString()
        );
    }
}
