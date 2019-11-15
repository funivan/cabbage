<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Router\Tests\Match\Result;

use Funivan\CabbageCore\Router\Match\Result\MatchResult;
use PHPUnit\Framework\TestCase;

final class MatchResultTest extends TestCase
{

    public function testSuccessResult() : void
    {
        self::assertTrue(MatchResult::createSuccess()->matched());
    }


    public function testParametersSuccess() : void
    {
        self::assertCount(
            0,
            MatchResult::createSuccess()->parameters()->toArray()
        );
    }
}
