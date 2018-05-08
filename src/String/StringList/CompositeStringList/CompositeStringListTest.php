<?php

namespace Funivan\CabbageCore\String\StringList\CompositeStringList;

use Funivan\CabbageCore\String\StringList\PredefinedStringList;
use PHPUnit\Framework\TestCase;

class CompositeStringListTest extends TestCase
{
    public function testAll(): void
    {
        self::assertSame(
            ['a', 'b', 'c'],
            iterator_to_array(
                (new CompositeStringList(new PredefinedStringList('a', 'b'), new PredefinedStringList('c')))->all()
            )
        );
    }
}
