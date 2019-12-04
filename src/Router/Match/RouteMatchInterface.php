<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\Match;

use Funivan\CabbageCore\Router\Match\Result\MatchResultInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Check request according to the match logic
 * and return Parameters on success
 */
interface RouteMatchInterface
{

    /**
     * @param ServerRequestInterface $request
     * @return MatchResultInterface
     */
    public function match(ServerRequestInterface $request): MatchResultInterface;
}
