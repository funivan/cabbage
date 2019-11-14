<?php

namespace Funivan\CabbageCore\String\StringModifier\RegexReplace;

use PHPUnit\Framework\TestCase;

final class RegexReplaceStringModifierTest extends TestCase
{
    public function testModify(): void
    {
        self::assertSame(
            'abc',
            (new RegexReplaceStringModifier('![0-9]+!', ''))->modify('a1b22c33')
        );
    }
}
