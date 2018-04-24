<?php

  declare(strict_types=1);

  namespace Funivan\CabbageCore\String\StringList\FilteredStringList;

  use Funivan\CabbageCore\String\Constraint\StringConstraintInterface;
  use Funivan\CabbageCore\String\StringList\StringListInterface;

  class FilteredStringList implements StringListInterface {


    /**
     * @var StringConstraintInterface
     */
    private $constraint;

    /**
     * @var StringListInterface
     */
    private $original;


    public function __construct(StringConstraintInterface $constraint, StringListInterface $original) {
      $this->constraint = $constraint;
      $this->original = $original;
    }


    /**
     * @return string[]|\Generator
     */
    public function all(): \Generator {
      foreach ($this->original->all() as $value) {
        if ($this->constraint->valid($value)) {
          yield $value;
        }
      }
    }
  }