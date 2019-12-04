<?php

namespace Funivan\CabbageCore\Float\FloatList;

use function iterator_to_array;
use PHPUnit\Framework\TestCase;

final class PredefinedFloatListTest extends TestCase
{
    public function testAll(): void
    {
        self::assertSame(
            [1.1, 0.0],
            iterator_to_array(
                new PredefinedFloatList(1.1, 0.0)
            )
        );
    }
}
