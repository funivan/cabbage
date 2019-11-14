<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\ParameterRoute;

use Funivan\CabbageCore\Http\Request\ParametersInterface;

/**
 *
 */
interface ParameterConstrainInterface
{

    /**
     * @param ParametersInterface $parameters
     * @return bool
     */
    public function validate(ParametersInterface $parameters): bool;


    /**
     * @return string
     */
    public function name(): string;

}
