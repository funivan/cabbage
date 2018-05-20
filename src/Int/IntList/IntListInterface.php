<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Int\IntList;

use Funivan\CabbageCore\BaseList\ListInterface;

interface IntListInterface extends ListInterface
{

    /**
     * @return int[]|\Generator
     */
    public function all(): \Generator;
}
