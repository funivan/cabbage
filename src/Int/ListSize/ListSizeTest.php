<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Int\ListSize;

use Funivan\CabbageCore\String\StringList\PredefinedStringList;
use PHPUnit\Framework\TestCase;

class ListSizeTest extends TestCase
{
    public function testValue(): void
    {
        self::assertSame(
            3,
            (new ListSize(new PredefinedStringList('1', '2', '3')))->value()
        );
    }
}
