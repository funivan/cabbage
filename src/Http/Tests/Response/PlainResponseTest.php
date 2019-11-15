<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Http\Tests\Response;

use Funivan\CabbageCore\DataStructures\Stack\StringStack;
use Funivan\CabbageCore\Http\Response\Body\BufferedBody;
use Funivan\CabbageCore\Http\Response\Plain\PlainResponse;
use PHPUnit\Framework\TestCase;

/**
 * @codeCoverageIgnore
 */
final class PlainResponseTest extends TestCase
{
    public function testContent(): void
    {
        $plainResponse = PlainResponse::create('Test');
        $buffer = new StringStack();
        (new BufferedBody($plainResponse->body(), $buffer))->send();
        self::assertSame('Test', $buffer->pop());
    }
}
