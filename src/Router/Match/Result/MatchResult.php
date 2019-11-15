<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\Match\Result;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObject;
use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObjectInterface;

/**
 *
 */
class MatchResult implements MatchResultInterface
{

    /**
     * @var bool
     */
    private $matched;

    /**
     * @var ArrayObjectInterface
     */
    private $parameters;


    /**
     * @param bool $matched
     * @param ArrayObjectInterface $parameters
     */
    private function __construct(bool $matched, ArrayObjectInterface $parameters)
    {
        $this->matched = $matched;
        $this->parameters = $parameters;
    }


    /**
     * @param bool $matched
     * @param ArrayObjectInterface $parameters
     * @return MatchResultInterface
     */
    public static function create(bool $matched, ArrayObjectInterface $parameters): MatchResultInterface
    {
        return new self($matched, $parameters);
    }


    /**
     * @return MatchResultInterface
     */
    public static function createSuccess(): MatchResultInterface
    {
        return new self(true, new ArrayObject([]));
    }


    /**
     * @return bool
     */
    final public function matched(): bool
    {
        return $this->matched;
    }


    /**
     * @return ArrayObjectInterface
     */
    final public function parameters(): ArrayObjectInterface
    {
        return $this->parameters;
    }

}