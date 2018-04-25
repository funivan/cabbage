<?php

namespace Funivan\CabbageCore\String\StringList\Combined;

use Funivan\CabbageCore\String\StringList\StringList;
use PHPUnit\Framework\TestCase;

class CombinedStringListTest extends TestCase
{
    public function testAll(): void
    {
        self::assertSame(
            ['a', 'b'],
            iterator_to_array(
                (new CombinedStringList(new StringList('a'), new StringList('b')))->all()
            )
        );
    }
}
