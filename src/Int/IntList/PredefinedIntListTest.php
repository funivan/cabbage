<?php

namespace Funivan\CabbageCore\Int\IntList;

use PHPUnit\Framework\TestCase;

final class PredefinedIntListTest extends TestCase
{
    public function testAll(): void
    {
        self::assertSame(
            [128, 256],
            iterator_to_array(
                new PredefinedIntList(128, 256)
            )
        );
    }
}
