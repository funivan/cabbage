<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Dispatcher;

use Psr\Http\Message\ServerRequestInterface;

/**
 * Run dispatcher and send response to the client.
 */
interface AppInterface
{

    /**
     * Send response to the client
     *
     * @param ServerRequestInterface $request
     * @return void
     */
    public function run(ServerRequestInterface $request): void;
}
