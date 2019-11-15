<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\PathRoute;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObjectInterface;
use Funivan\CabbageCore\Router\UrlInterface;

/**
 *
 */
class PathUrl implements UrlInterface
{

    /**
     * @var string
     */
    private $path;

    /**
     * @var ArrayObjectInterface
     */
    private $parameters;


    /**
     * @param string $path
     * @param ArrayObjectInterface $parameters
     */
    public function __construct(string $path, ArrayObjectInterface $parameters)
    {
        $this->path = $path;
        $this->parameters = $parameters;
    }


    /**
     * Create url from the parameters
     *
     * @return string
     */
    final public function build(): string
    {
        $path = $this->path;
        $parameters = $this->parameters->toArray();
        if (count($parameters) > 0) {
            $path = $path . '?' . http_build_query($parameters);
        }
        return $path;
    }
}