<?php

namespace Funivan\CabbageCore\Int\IntList;

use PHPUnit\Framework\TestCase;

class PredefinedIntListTest extends TestCase
{
    public function testAll()
    {
        self::assertSame(
            [128, 256],
            iterator_to_array((new PredefinedIntList(128, 256))->all())
        );
    }
}
