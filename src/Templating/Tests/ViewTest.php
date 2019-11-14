<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Templating\Tests;

use Funivan\CabbageCore\Templating\Exception\OverwriteViewVariableException;
use Funivan\CabbageCore\Templating\View;
use Funivan\CabbageCore\Templating\ViewInterface;
use PHPUnit\Framework\TestCase;

/**
 * @codeCoverageIgnore
 */
final class ViewTest extends TestCase
{

    private static function assertViewContent(string $content, ViewInterface $view) : void
    {
        self::assertSame(
            $content,
            preg_replace(
                '!>\s*<!',
                '><',
                str_replace("\n", '', trim($view->render()))
            )
        );
    }

    public function testSimpleRender(): void
    {
        $view = View::create(__DIR__ . '/fixtures/viewTitle.php', ['title' => 'users']);
        self::assertViewContent('<h1>users</h1>', $view);
    }


    public function testWithSimpleSubView(): void
    {
        $view = View::createWithView(
            __DIR__ . '/fixtures/viewWrapper.php',
            [],
            View::create(__DIR__ . '/fixtures/viewTitle.php', ['title' => 'Test title'])
        );
        self::assertViewContent(
            '<div class="wrapper"><h1>Test title</h1></div>',
            $view
        );
    }


    public function testWithMultipleNestedViews(): void
    {
        $view =
            View::create(__DIR__ . '/fixtures/viewWrapper.php', [])
                ->withSubView(
                    View::createWithView(
                        __DIR__ . '/fixtures/viewWrapper.php',
                        [],
                        View::create(__DIR__ . '/fixtures/viewTitle.php', ['title' => 'Test title'])
                    )
                );
        self::assertViewContent(
            '<div class="wrapper"><div class="wrapper"><h1>Test title</h1></div></div>', $view
        );
    }


    public function testWithOverwriteData(): void
    {
        $this->expectException(OverwriteViewVariableException::class);
        $view = View::create(__DIR__ . '/fixtures/viewWrapper.php', ['content' => 'test mainViewContent'])
            ->withSubView(
                View::create(__DIR__ . '/fixtures/viewTitle.php', ['title' => 'title'])
            );
        $view->render();
    }


}
