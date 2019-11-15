<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\ParameterRoute;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObjectInterface;

/**
 *
 */
class SameParameterConstrain implements ParameterConstrainInterface
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;


    /**
     * @param string $name
     * @param string $value
     */
    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }


    /**
     * @param ArrayObjectInterface $parameters
     * @return bool
     */
    final public function validate(ArrayObjectInterface $parameters): bool
    {
        $parameter = $parameters->toArray()[$this->name] ?? null;
        return ($parameter === $this->value);
    }


    /**
     * @return string
     */
    final public function name(): string
    {
        return $this->name;
    }

}