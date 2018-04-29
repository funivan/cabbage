<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\BaseList;

interface ListInterface
{
    public function all(): \Generator;
}
