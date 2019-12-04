<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Dispatcher;

use Funivan\CabbageCore\Http\Response\ResponseInterface;
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


    /**
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }


    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    final public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->response;
    }
}
