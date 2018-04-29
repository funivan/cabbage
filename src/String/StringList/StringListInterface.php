<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\String\StringList;

use Funivan\CabbageCore\BaseList\ListInterface;

interface StringListInterface extends ListInterface
{

    /**
     * @return string[]|\Generator
     */
    public function all(): \Generator;
}
