<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Http\Request;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObjectInterface;
use Funivan\CabbageCore\Http\Request\Cookie\RequestCookiesInterface;


/**
 *
 */
interface RequestInterface
{


    /**
     * Represent input GET parameters
     *
     * @return ArrayObjectInterface
     */
    public function get(): ArrayObjectInterface;


    /**
     * Represent SERVER parameters
     *
     * @return ArrayObjectInterface
     */
    public function server(): ArrayObjectInterface;


    /**
     * Represent input POST parameters
     *
     * @return ArrayObjectInterface
     */
    public function post(): ArrayObjectInterface;


    /**
     * Represent custom user parameters. Can be
     *
     * @return ArrayObjectInterface
     */
    public function parameters(): ArrayObjectInterface;


    /**
     * @return RequestCookiesInterface
     */
    public function cookies(): RequestCookiesInterface;


    /**
     * @param ArrayObjectInterface $parameters
     * @return RequestInterface
     */
    public function withParameters(ArrayObjectInterface $parameters): RequestInterface;

}