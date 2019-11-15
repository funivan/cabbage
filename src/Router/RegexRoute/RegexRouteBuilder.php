<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\RegexRoute;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObjectInterface;
use Funivan\CabbageCore\Router\UrlInterface;

/**
 *
 */
class RegexRouteBuilder implements UrlInterface
{

    /**
     * @var string
     */
    private $regex;

    /**
     * @var ArrayObjectInterface
     */
    private $parameters;


    /**
     * @param string $regex
     * @param ArrayObjectInterface $parameters
     */
    public function __construct(string $regex, ArrayObjectInterface $parameters)
    {
        $this->regex = $regex;
        $this->parameters = $parameters;
    }


    /**
     * @return string
     * @todo take a look: Complicated code
     * Create url from the parameters
     */
    final public function build(): string
    {
        $path = $this->regex;
        $usedParameters = [];
        $path = preg_replace_callback('/\(\?<(?<name>[a-z]+)>[^)]+\)/', function ($match) use (&$usedParameters) {
            $name = (string)$match['name'];
            $value = $this->parameters->value($name);
            $usedParameters[$name] = true;
            return $value;
        }, $path);
        $additionalParameters = $this->parameters->toArray();
        foreach ($additionalParameters as $name => $parameter) {
            if (array_key_exists($name, $usedParameters)) {
                unset($additionalParameters[$name]);
            }
        }
        if (count($additionalParameters) > 0) {
            $path = $path . '?' . http_build_query($additionalParameters);
        }
        return $path;
    }
}