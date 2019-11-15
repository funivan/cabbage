<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Dispatcher;

use Funivan\CabbageCore\Http\Request\RequestInterface;
use Funivan\CabbageCore\Http\Response\ResponseInterface;

/**
 * Convert Request to the Response
 */
interface DispatcherInterface
{

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function handle(RequestInterface $request): ResponseInterface;
}
