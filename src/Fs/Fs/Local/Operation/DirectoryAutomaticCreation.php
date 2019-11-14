<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Fs\Fs\Local\Operation;

use Funivan\CabbageCore\Fs\PathInterface;

/**
 *
 */
class DirectoryAutomaticCreation implements DirectoryOperation
{

    /**
     * @param PathInterface $path
     * @return bool
     */
    final public function perform(PathInterface $path): bool
    {
        $dir = $path->assemble();
        if (is_dir($dir)) {
            $result = true;
        } else {
            $result = @mkdir($dir, 0777, true);
        }
        return $result;
    }

}
