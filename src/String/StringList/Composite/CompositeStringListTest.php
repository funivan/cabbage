<?php

namespace Funivan\CabbageCore\String\StringList\Composite;

use Funivan\CabbageCore\String\StringList\PredefinedStringList;
use PHPUnit\Framework\TestCase;

final class CompositeStringListTest extends TestCase
{
    public function testAll(): void
    {
        self::assertSame(
            ['a', 'b', 'c'],
            iterator_to_array(
                new CompositeStringList(new PredefinedStringList('a', 'b'), new PredefinedStringList('c'))
            )
        );
    }
}
