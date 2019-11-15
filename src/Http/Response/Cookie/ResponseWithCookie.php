<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Http\Response\Cookie;

use Funivan\CabbageCore\Http\Response\Body\BodyInterface;
use Funivan\CabbageCore\Http\Response\Headers\Field;
use Funivan\CabbageCore\Http\Response\Headers\Headers;
use Funivan\CabbageCore\Http\Response\HeadersInterface;
use Funivan\CabbageCore\Http\Response\ResponseInterface;
use Funivan\CabbageCore\Http\Response\StatusInterface;

/**
 *
 */
class ResponseWithCookie implements ResponseInterface
{

    /**
     * @var ResponseInterface
     */
    private $original;

    /**
     * @var ResponseCookieInterface
     */
    private $cookie;


    /**
     * @param ResponseCookieInterface $cookie
     * @param ResponseInterface $original
     */
    public function __construct(ResponseCookieInterface $cookie, ResponseInterface $original)
    {
        $this->original = $original;
        $this->cookie = $cookie;
    }


    /**
     * @return StatusInterface
     */
    final public function status(): StatusInterface
    {
        return $this->original->status();
    }


    /**
     * @return HeadersInterface
     */
    final public function headers(): HeadersInterface
    {
        $headerFields = $this->original->headers()->fields();
        $rawCookieData = [];
        //@todo move comparison to the field
        foreach ($headerFields as $index => $field) {
            if ($field->name() === 'Set-Cookie') {
                $rawCookieData[] = rtrim($field->value(), ';');
                unset($headerFields[$index]);
                break;
            }
        }
        $rawCookieData[] = $this->cookie->assemble();
        $headerFields[] = new Field('Set-Cookie', implode(';', $rawCookieData));
        return new Headers($headerFields);
    }


    /**
     * @return BodyInterface
     */
    final public function body(): BodyInterface
    {
        return $this->original->body();
    }
}
