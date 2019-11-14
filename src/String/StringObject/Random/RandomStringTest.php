<?php

namespace Funivan\CabbageCore\String\StringObject\Random;

use Funivan\CabbageCore\String\StringList\PredefinedStringList;
use PHPUnit\Framework\TestCase;

final class RandomStringTest extends TestCase
{
    public function testValue() : void
    {
        self::assertTrue(
            in_array(
                (new RandomString((new PredefinedStringList('name', 'id'))))->toString(),
                ['name', 'id'],
                true
            )
        );
    }
}
