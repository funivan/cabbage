<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\Match\Result;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObject;
use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObjectInterface;

class FailedMatchResult implements MatchResultInterface
{

    /**
     * @return bool
     */
    final public function matched(): bool
    {
        return false;
    }


    /**
     * @return ArrayObjectInterface
     */
    final public function parameters(): ArrayObjectInterface
    {
        return new ArrayObject([]);
    }
}