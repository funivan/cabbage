<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Http\Request;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObject;
use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObjectInterface;
use Funivan\CabbageCore\Http\Request\Cookie\RequestCookiesInterface;

/**
 *
 */
class Request implements RequestInterface
{

    /**
     * @var ArrayObjectInterface
     */
    private $get;

    /**
     * @var ArrayObjectInterface
     */
    private $post;

    /**
     * @var ArrayObjectInterface
     */
    private $server;

    /**
     * @var ArrayObjectInterface
     */
    private $userParameters;

    /**
     * @var RequestCookiesInterface
     */
    private $cookies;


    /**
     * @param ArrayObjectInterface $get
     * @param ArrayObjectInterface $post
     * @param ArrayObjectInterface $server
     * @param ArrayObjectInterface $userParameters
     * @param RequestCookiesInterface $cookies
     */
    public function __construct(ArrayObjectInterface $get, ArrayObjectInterface $post, ArrayObjectInterface $server, ArrayObjectInterface $userParameters, RequestCookiesInterface $cookies)
    {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
        $this->userParameters = $userParameters;
        $this->cookies = $cookies;
    }


    /**
     * @param ArrayObjectInterface $parameters
     * @return RequestInterface
     */
    final public function withParameters(ArrayObjectInterface $parameters): RequestInterface
    {
        return new Request(
            $this->get,
            $this->post,
            $this->server,
            new ArrayObject(array_merge_recursive($this->parameters()->toArray(), $parameters->toArray())),
            $this->cookies
        );
    }


    /**
     * @return ArrayObjectInterface
     */
    final public function get(): ArrayObjectInterface
    {
        return $this->get;
    }


    /**
     * @return ArrayObjectInterface
     */
    final public function server(): ArrayObjectInterface
    {
        return $this->server;
    }


    /**
     * @return ArrayObjectInterface
     */
    final public function post(): ArrayObjectInterface
    {
        return $this->post;
    }


    /**
     * @return ArrayObjectInterface
     */
    final public function parameters(): ArrayObjectInterface
    {
        return $this->userParameters;
    }


    /**
     * @return RequestCookiesInterface
     */
    final public function cookies(): RequestCookiesInterface
    {
        return $this->cookies;
    }

}