<?php

  declare(strict_types=1);

  namespace Funivan\Cabbage\String\StringList\CompositeStringList;

  use Funivan\Cabbage\String\StringList\StringListInterface;

  class CompositeStringList implements StringListInterface {

    /**
     * @var StringListInterface[]
     */
    private $items;


    public function __construct(StringListInterface ...$items) {
      $this->items = $items;
    }


    public function all(): \Generator {
      foreach ($this->items as $item) {
        foreach ($item->all() as $value) {
          yield $value;
        }
      }
    }

  }