<?php

namespace Funivan\CabbageCore\Int\IntList\Filtered;

use Funivan\CabbageCore\Int\IntConstraint\Gt\GtIntConstraint;
use Funivan\CabbageCore\Int\IntList\PredefinedIntList;
use PHPUnit\Framework\TestCase;

final class FilteredIntListTest extends TestCase
{
    public function testAll(): void
    {
        self::assertSame(
            [4, 5, 6],
            iterator_to_array(
                new FilteredIntList(
                    new GtIntConstraint(3),
                    new PredefinedIntList(1, 2, 3, 4, 5, 6)
                )
            )
        );
    }
}
