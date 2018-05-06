<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Int\ListSize;

use Funivan\CabbageCore\String\StringList\StringList;
use PHPUnit\Framework\TestCase;

class ListSizeTest extends TestCase
{
    public function testValue(): void
    {
        self::assertSame(
            3,
            (new ListSize(new StringList('1', '2', '3')))->value()
        );
    }
}
