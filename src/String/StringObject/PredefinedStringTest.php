<?php

namespace Funivan\CabbageCore\String\StringObject;

use PHPUnit\Framework\TestCase;

class PredefinedStringTest extends TestCase
{

    public function testValue()
    {
        self::assertSame(
            'val',
            (new PredefinedString('val'))->value()
        );
    }
}
