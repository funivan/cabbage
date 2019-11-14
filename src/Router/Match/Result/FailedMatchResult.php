<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\Match\Result;

use Funivan\CabbageCore\Http\Request\Parameters;
use Funivan\CabbageCore\Http\Request\ParametersInterface;

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
     * @return ParametersInterface
     */
    final public function parameters(): ParametersInterface
    {
        return new Parameters([]);
    }
}