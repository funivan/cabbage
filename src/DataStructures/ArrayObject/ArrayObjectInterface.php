<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\DataStructures\ArrayObject;

/**
 *
 */
interface ArrayObjectInterface
{


    /**
     * Return null if value is not stored in the array
     *
     * @param string $name
     * @return string|int|float|array|null
     * @noinspection MissingReturnTypeInspection
     */
    public function value(string $name);


    /**
     * @return array
     */
    public function toArray(): array;

}