<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Http\Response\Redirect;

use Funivan\CabbageCore\Http\Response\Body\BodyInterface;
use Funivan\CabbageCore\Http\Response\Headers\Field;
use Funivan\CabbageCore\Http\Response\Headers\Headers;
use Funivan\CabbageCore\Http\Response\HeadersInterface;
use Funivan\CabbageCore\Http\Response\Plain\PlainBody;
use Funivan\CabbageCore\Http\Response\ResponseInterface;
use Funivan\CabbageCore\Http\Response\Status\ResponseStatus;
use Funivan\CabbageCore\Http\Response\StatusInterface;
use Funivan\CabbageCore\Router\UrlInterface;

/**
 *
 */
class RedirectResponse implements ResponseInterface
{

    /**
     * @var UrlInterface
     */
    private $url;

    /**
     * @var int
     */
    private $code;


    /**
     * @param UrlInterface $url
     * @param int $code
     */
    public function __construct(UrlInterface $url, int $code)
    {
        $this->url = $url;
        $this->code = $code;
    }


    /**
     * @return StatusInterface
     */
    final public function status(): StatusInterface
    {
        return new ResponseStatus($this->code);
    }


    /**
     * @return HeadersInterface
     */
    final public function headers(): HeadersInterface
    {
        #@todo create UnCachableHeaders
        return new Headers(
            [
                new Field('Location', $this->url->build()),
                new Field('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0'),
                new Field('Pragma', 'no-cache'),
            ]
        );
    }


    /**
     * @return BodyInterface
     */
    final public function body(): BodyInterface
    {
        return new PlainBody(
            sprintf(/** @lang text */
                'Redirect to url: <a href="%1$s">%1$s</a>', $this->url->build())
        );
    }
}
