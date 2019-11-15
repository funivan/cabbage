<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Router\Tests\Match\Result;

use Funivan\CabbageCore\Router\Match\Result\FailedMatchResult;
use PHPUnit\Framework\TestCase;

final class FailedMatchResultTest extends TestCase
{

    public function testFailureResult(): void
    {
        self::assertFalse((new FailedMatchResult())->matched());
    }


    public function testParametersFailure(): void
    {
        self::assertCount(
            0,
            (new FailedMatchResult())->parameters()->toArray()
        );
    }

}
