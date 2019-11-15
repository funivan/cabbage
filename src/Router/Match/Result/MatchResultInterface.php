<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\Match\Result;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObjectInterface;

/**
 *
 */
interface MatchResultInterface
{

    /**
     * @return bool
     */
    public function matched(): bool;


    /**
     * @return ArrayObjectInterface
     */
    public function parameters(): ArrayObjectInterface;
}
