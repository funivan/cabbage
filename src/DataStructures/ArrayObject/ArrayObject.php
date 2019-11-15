<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\DataStructures\ArrayObject;

class ArrayObject implements ArrayObjectInterface
{

    /**
     * @var array
     */
    private $data;


    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }


    /**
     * @noinspection MissingReturnTypeInspection
     */
    final public function value(string $name)
    {
        return $this->data[$name] ?? null;
    }


    /**
     * @return array
     */
    final public function toArray(): array
    {
        return $this->data;
    }

}