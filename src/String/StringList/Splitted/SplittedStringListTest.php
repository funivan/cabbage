<?php

namespace Funivan\CabbageCore\String\StringList\Splitted;

use PHPUnit\Framework\TestCase;

final class SplittedStringListTest extends TestCase
{
    public function testAll(): void
    {
        self::assertSame(
            ['a', 'b'],
            iterator_to_array(new SplittedStringList('!,\s*!', 'a, b'))
        );
    }
}
