<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Http\Tests\Request;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObject;
use PHPUnit\Framework\TestCase;

/**
 * @codeCoverageIgnore
 */
final class ParametersTest extends TestCase
{

    public function testReturnArray(): void
    {
        $parameters = new ArrayObject(['users' => ['1', '2'], 'id' => 123]);
        self::assertSame(['1', '2'], $parameters->value('users'));
    }


    public function testValue(): void
    {
        $parameters = new ArrayObject(['user' => '', 'name' => true]);
        self::assertTrue($parameters->value('name'));
        self::assertSame('', $parameters->value('user'));
    }

}
