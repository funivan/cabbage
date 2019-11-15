<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\ParameterRoute;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObjectInterface;

/**
 *
 */
interface ParameterConstrainInterface
{

    /**
     * @param ArrayObjectInterface $parameters
     * @return bool
     */
    public function validate(ArrayObjectInterface $parameters): bool;


    /**
     * @return string
     */
    public function name(): string;
}
