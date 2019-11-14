<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Dispatcher;

use Funivan\CabbageCore\Http\Request\Request;


/**
 * Run dispatcher and send response to the client.
 */
interface AppInterface
{

    /**
     * Send response to the client
     *
     * @param Request $request
     * @return void
     */
    public function run(Request $request): void;
}