<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Int\IntObject;

use PHPUnit\Framework\TestCase;

class PredefinedIntTest extends TestCase
{
    public function testValue(): void
    {
        self::assertSame(
            1,
            (new PredefinedInt(1))->value()
        );
    }
}
