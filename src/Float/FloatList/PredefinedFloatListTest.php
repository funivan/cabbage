<?php

namespace Funivan\CabbageCore\Float\FloatList;

use PHPUnit\Framework\TestCase;

class PredefinedFloatListTest extends TestCase
{
    public function testAll()
    {
        self::assertSame(
            [1.1, 0.0],
            \iterator_to_array(
                (new PredefinedFloatList(1.1, 0.0))->all()
            )
        );
    }
}
