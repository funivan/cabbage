<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Fs\Fs\Local\Operation;

use Funivan\CabbageCore\Fs\PathInterface;

/**
 *
 */
interface DirectoryOperation
{

    /**
     * @param PathInterface $path
     * @return bool
     */
    public function perform(PathInterface $path): bool;

}