<?php

  declare(strict_types=1);

  namespace Funivan\Cabbage\String\StringList;

  class StringList implements StringListInterface {


    /**
     * @var string[]
     */
    private $items;


    public function __construct(string ...$items) {
      $this->items = $items;
    }


    /**
     * @return string[]|\Generator
     */
    public function all(): \Generator {
      yield from $this->items;
    }
  }