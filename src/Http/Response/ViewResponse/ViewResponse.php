<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Http\Response\ViewResponse;

use Funivan\CabbageCore\Http\Response\Body\BodyInterface;
use Funivan\CabbageCore\Http\Response\Headers\Headers;
use Funivan\CabbageCore\Http\Response\HeadersInterface;
use Funivan\CabbageCore\Http\Response\ResponseInterface;
use Funivan\CabbageCore\Http\Response\Status\ResponseStatus;
use Funivan\CabbageCore\Http\Response\StatusInterface;
use Funivan\CabbageCore\Templating\ViewInterface;

/**
 *
 */
class ViewResponse implements ResponseInterface
{

    /**
     * @var ViewInterface
     */
    private $view;


    /**
     * @param ViewInterface $view
     */
    public function __construct(ViewInterface $view)
    {
        $this->view = $view;
    }


    /**
     * @return StatusInterface
     */
    final public function status(): StatusInterface
    {
        return new ResponseStatus(200);
    }


    /**
     * @return HeadersInterface
     */
    final public function headers(): HeadersInterface
    {
        return new Headers([]);
    }


    /**
     * @return BodyInterface
     */
    final public function body(): BodyInterface
    {
        return new ViewBody($this->view);
    }
}
