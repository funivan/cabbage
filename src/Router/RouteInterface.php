<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router;

use Funivan\CabbageCore\Dispatcher\DispatcherInterface;
use Funivan\CabbageCore\Router\Match\RouteMatchInterface;

/**
 *
 */
interface RouteInterface extends RouteMatchInterface, DispatcherInterface
{
}
