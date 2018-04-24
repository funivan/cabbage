<?php

  namespace Funivan\CabbageCore\String\StringList\SplittedStringList;

  use PHPUnit\Framework\TestCase;

  class SplittedStringListTest extends TestCase {

    public function testAll(): void {
      self::assertSame(
        ['a', 'b'],
        iterator_to_array((new SplittedStringList('!,\s*!', 'a, b'))->all())
      );
    }
  }
