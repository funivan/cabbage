<?php


declare(strict_types=1);

namespace Funivan\CabbageCore\Router\Tests\Fixtures;

use Funivan\CabbageCore\Http\Request\RequestInterface;
use Funivan\CabbageCore\Http\Response\ResponseInterface;
use Funivan\CabbageCore\Router\Match\Result\MatchResultInterface;
use Funivan\CabbageCore\Router\RouteInterface;

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
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    final public function handle(RequestInterface $request): ResponseInterface
    {
        return $this->response;
    }


    /**
     * @param RequestInterface $request
     * @return MatchResultInterface
     */
    final public function match(RequestInterface $request): MatchResultInterface
    {
        return $this->matchResult;
    }
}