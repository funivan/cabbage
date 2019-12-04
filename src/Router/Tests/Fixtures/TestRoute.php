<?php


declare(strict_types=1);

namespace Funivan\CabbageCore\Router\Tests\Fixtures;

use Funivan\CabbageCore\Http\Response\ResponseInterface;
use Funivan\CabbageCore\Router\Match\Result\MatchResultInterface;
use Funivan\CabbageCore\Router\RouteInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @codeCoverageIgnore
 */
class TestRoute implements RouteInterface
{

    /**
     * @var MatchResultInterface
     */
    private $matchResult;

    /**
     * @var ResponseInterface
     */
    private $response;


    /**
     * @param MatchResultInterface $result
     * @param ResponseInterface $response
     */
    public function __construct(MatchResultInterface $result, ResponseInterface $response)
    {
        $this->matchResult = $result;
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


    /**
     * @param ServerRequestInterface $request
     * @return MatchResultInterface
     */
    final public function match(ServerRequestInterface $request): MatchResultInterface
    {
        return $this->matchResult;
    }
}
