<?php

  namespace Funivan\Cabbage\String\StringList\CompositeStringList;

  use Funivan\Cabbage\String\StringList\StringList;
  use PHPUnit\Framework\TestCase;

  class CompositeStringListTest extends TestCase {

    public function testAll(): void {
      self::assertSame(
        ['a', 'b', 'c'],
        iterator_to_array(
          (new CompositeStringList(new StringList('a', 'b'), new StringList('c')))->all()
        )
      );
    }
  }
