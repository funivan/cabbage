<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\String\StringList\Splitted;

use Funivan\CabbageCore\String\StringList\StringListInterface;

class SplittedStringList implements StringListInterface
{


    /**
     * @var string
     */
    private $pattern;

    /**
     * @var string
     */
    private $input;


    public function __construct(string $pattern, string $input)
    {
        $this->pattern = $pattern;
        $this->input = $input;
    }


    /**
     * @return string[]|\Generator
     */
    public function all(): \Generator
    {
        $result = preg_split($this->pattern, $this->input);
        if (!is_array($result)) {
            throw new \RuntimeException('Can not split string');
        }
        yield from $result;
    }
}
