<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Http\Tests\Response\Body;

use Funivan\CabbageCore\DataStructures\Stack\StringStack;
use Funivan\CabbageCore\Http\Response\Body\BufferedBody;
use Funivan\CabbageCore\Http\Response\Plain\PlainBody;
use PHPUnit\Framework\TestCase;

/**
 * @codeCoverageIgnore
 */
final class BufferedBodyTest extends TestCase
{

    public function testOutputToStackOnly(): void
    {
        $stack = new StringStack();
        ob_start();
        (new BufferedBody(new PlainBody('user'), $stack))->send();
        $result = ob_get_clean();
        self::assertSame('', $result);
        self::assertFalse($stack->empty());
    }
}
