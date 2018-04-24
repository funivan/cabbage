<?php

  declare(strict_types=1);

  namespace Funivan\CabbageCore\String\StringModifier\RegexReplace;

  use Funivan\CabbageCore\String\StringModifier\StringModifierInterface;

  class RegexReplaceStringModifier implements StringModifierInterface {

    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;


    public function __construct(string $from, string $to) {
      $this->from = $from;
      $this->to = $to;
    }


    public function modify(string $input): string {
      $result = preg_replace($this->from, $this->to, $input);
      if (\is_string($result)) {
        return $result;
      }
      throw new \RuntimeException('Can not replace string');
    }
  }