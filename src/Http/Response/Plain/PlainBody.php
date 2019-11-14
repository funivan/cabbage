<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Http\Response\Plain;

use Funivan\CabbageCore\Http\Response\Body\BodyInterface;

/**
 *
 */
class PlainBody implements BodyInterface
{

    /**
     * @var string
     */
    private $content;


    /**
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }


    /**
     * @return void
     */
    final public function send(): void
    {
        echo $this->content;
    }


}