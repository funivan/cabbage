<?php

namespace Funivan\CabbageCore\String\StringList\Combined;

use Funivan\CabbageCore\String\StringList\PredefinedStringList;
use PHPUnit\Framework\TestCase;

final class CombinedStringListTest extends TestCase
{
    public function testAll(): void
    {
        self::assertSame(
            ['a', 'b'],
            iterator_to_array(
                new CombinedStringList(new PredefinedStringList('a'), new PredefinedStringList('b'))
            )
        );
    }
}
