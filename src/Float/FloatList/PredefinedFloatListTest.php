<?php

namespace Funivan\CabbageCore\Float\FloatList;

use PHPUnit\Framework\TestCase;
use function iterator_to_array;

final class PredefinedFloatListTest extends TestCase
{
    public function testAll() : void
    {
        self::assertSame(
            [1.1, 0.0],
            iterator_to_array(
                new PredefinedFloatList(1.1, 0.0)
            )
        );
    }
}
