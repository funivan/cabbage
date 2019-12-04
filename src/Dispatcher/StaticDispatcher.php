<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Dispatcher;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 *
 */
class StaticDispatcher implements DispatcherInterface
{

    /**
     * @var ResponseInterface
     */
    private $response;


    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }


    final public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->response;
    }
}
