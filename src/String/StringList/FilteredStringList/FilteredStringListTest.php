<?php

  declare(strict_types=1);

  namespace Funivan\CabbageCore\String\StringList\FilteredStringList;

  use Funivan\CabbageCore\String\Constraint\RegexStringConstraint;
  use Funivan\CabbageCore\String\StringList\StringList;
  use PHPUnit\Framework\TestCase;

  class FilteredStringListTest extends TestCase {

    public function testAll(): void {
      self::assertSame(['a1', 'b2'],
        iterator_to_array(
          (new FilteredStringList(
            new RegexStringConstraint('!\d!'),
            new StringList('a', 'b', 'a1', 'b2')
          ))->all()
        )
      );

    }
  }
