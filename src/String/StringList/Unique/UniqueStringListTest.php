<?php

  declare(strict_types=1);

  namespace Funivan\Cabbage\String\StringList\Unique;

  use Funivan\Cabbage\String\StringList\StringList;
  use PHPUnit\Framework\TestCase;

  class UniqueStringListTest extends TestCase {

    public function testAll(): void {
      self::assertSame(
        ['a', 'b', 'c'],
        iterator_to_array(
          (new UniqueStringList(new StringList('a', 'b', 'a', 'c')))->all()
        )
      );
    }

  }
