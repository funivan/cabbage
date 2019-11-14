<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Fs\Fs\Local\Operation;

use Funivan\CabbageCore\Fs\PathInterface;

/**
 *
 */
class DirectoryCheck implements DirectoryOperation
{

    /**
     * @param PathInterface $path
     * @return bool
     */
    final public function perform(PathInterface $path): bool
    {
        return is_dir($path->assemble());
    }

}
