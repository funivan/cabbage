<?php

namespace Funivan\CabbageCore\String\StringObject\Random;

use Funivan\CabbageCore\String\StringList\PredefinedStringList;
use PHPUnit\Framework\TestCase;

class RandomStringTest extends TestCase
{
    public function testValue()
    {
        self::assertTrue(
            in_array(
                (new RandomString((new PredefinedStringList('name', 'id'))))->value(),
                ['name', 'id'],
                true
            )
        );
    }
}
