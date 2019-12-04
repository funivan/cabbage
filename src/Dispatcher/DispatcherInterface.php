<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Dispatcher;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Convert Request to the Response
 */
interface DispatcherInterface
{

    public function handle(ServerRequestInterface $request): ResponseInterface;
}
