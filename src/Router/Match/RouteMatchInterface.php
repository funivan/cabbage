<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\Match;

use Funivan\CabbageCore\Http\Request\RequestInterface;
use Funivan\CabbageCore\Router\Match\Result\MatchResultInterface;

/**
 * Check request according to the match logic
 * and return Parameters on success
 */
interface RouteMatchInterface
{

    /**
     * @param RequestInterface $request
     * @return MatchResultInterface
     */
    public function match(RequestInterface $request): MatchResultInterface;
}
