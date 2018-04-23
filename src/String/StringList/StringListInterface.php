<?php

  declare(strict_types=1);

  namespace Funivan\Cabbage\String\StringList;

  interface StringListInterface {

    /**
     * @return string[]|\Generator
     */
    public function all(): \Generator;

  }