<?php

namespace Funivan\CabbageCore\String\StringList;

use PHPUnit\Framework\TestCase;

final class PredefinedStringListTest extends TestCase
{
    public function testAll(): void
    {
        self::assertSame(
            ['a', 'b'],
            iterator_to_array(
                new PredefinedStringList('a', 'b')
            )
        );
    }
}
