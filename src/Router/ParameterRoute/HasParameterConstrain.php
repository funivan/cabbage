<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\ParameterRoute;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObjectInterface;

/**
 * Check if Parameters has specific parameter
 * Does not perform value check
 */
class HasParameterConstrain implements ParameterConstrainInterface
{

    /**
     * @var string
     */
    private $name;


    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }


    /**
     * @param ArrayObjectInterface $parameters
     * @return bool
     */
    final public function validate(ArrayObjectInterface $parameters): bool
    {
        return $parameters->value($this->name()) !== null;
    }


    /**
     * @return string
     */
    final public function name(): string
    {
        return $this->name;
    }


}