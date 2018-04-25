<?php

  declare(strict_types=1);

  namespace Funivan\CabbageCore\String\StringList\Combined;

  use Funivan\CabbageCore\String\StringList\StringListInterface;

  class CombinedStringList implements StringListInterface {

    /**
     * @var string[]
     */
    private $values;


    public function __construct(StringListInterface ...$items) {
      $values = [];
      foreach ($items as $item) {
        $values = array_merge($values, iterator_to_array($item->all()));
      }
      $this->values = $values;
    }


    /**
     * @return string[]|\Generator
     */
    public function all(): \Generator {
      yield from $this->values;
    }
  }