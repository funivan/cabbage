<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Int\ListSize;

use Funivan\CabbageCore\BaseList\ListInterface;
use Funivan\CabbageCore\Int\IntObject\IntInterface;

class ListSize implements IntInterface
{
    /**
     * @var ListInterface
     */
    private $list;

    public function __construct(ListInterface $list)
    {
        $this->list = $list;
    }

    public function value(): int
    {
        return \count(\iterator_to_array($this->list->all()));
    }
}
