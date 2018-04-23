<?php

  declare(strict_types=1);

  namespace Funivan\Cabbage\String\StringList\SplittedStringList;

  use Funivan\Cabbage\String\StringList\StringListInterface;

  class SplittedStringList implements StringListInterface {


    /**
     * @var string
     */
    private $pattern;

    /**
     * @var string
     */
    private $input;


    public function __construct(string $pattern, string $input) {
      $this->pattern = $pattern;
      $this->input = $input;
    }


    /**
     * @return string[]|\Generator
     */
    public function all(): \Generator {
      $result = preg_split($this->pattern, $this->input);
      yield from $result;
    }
  }