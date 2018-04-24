<?php

  namespace Funivan\CabbageCore\String\StringList;

  use PHPUnit\Framework\TestCase;

  class StringListTest extends TestCase {

    public function testAll(): void {
      self::assertSame(
        ['a', 'b'],
        iterator_to_array(
          (new StringList('a', 'b'))->all()
        )
      );

    }
  }
