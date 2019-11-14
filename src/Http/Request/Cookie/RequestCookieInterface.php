<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Http\Request\Cookie;

/**
 *
 */
interface RequestCookieInterface
{

    /**
     * @return string
     */
    public function name(): string;


    /**
     * @return string
     */
    public function value(): string;


}