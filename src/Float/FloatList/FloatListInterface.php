<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Float\FloatList;

use Funivan\CabbageCore\BaseList\ListInterface;

interface FloatListInterface extends ListInterface
{

    /**
     * @return float[]|\Generator
     */
    public function all(): \Generator;
}
