<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\Match\Result;

use Funivan\CabbageCore\Http\Request\ParametersInterface;

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
     * @return ParametersInterface
     */
    public function parameters(): ParametersInterface;


}