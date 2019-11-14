<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Int\IntList\Filtered;

use Funivan\CabbageCore\Int\IntConstraint\IntConstraintInterface;
use Funivan\CabbageCore\Int\IntList\IntListInterface;

class FilteredIntList implements IntListInterface
{
    /**
     * @var IntConstraintInterface
     */
    private $constraint;
    /**
     * @var IntListInterface
     */
    private $list;

    public function __construct(IntConstraintInterface $constraint, IntListInterface $list)
    {
        $this->constraint = $constraint;
        $this->list = $list;
    }

    /**
     * @return float[]|iterable
     */
    final public function getIterator(): iterable
    {
        foreach ($this->list->getIterator() as $value) {
            if ($this->constraint->valid($value)) {
                yield $value;
            }
        }
    }
}
