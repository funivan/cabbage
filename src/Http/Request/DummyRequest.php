<?php
declare(strict_types=1);

namespace Funivan\CabbageCore\Http\Request;

use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObject;
use Funivan\CabbageCore\DataStructures\ArrayObject\ArrayObjectInterface;
use Funivan\CabbageCore\Http\Request\Cookie\RequestCookies;
use Funivan\CabbageCore\Http\Request\Cookie\RequestCookiesInterface;

class DummyRequest extends Request
{
    public function __construct(
        ArrayObjectInterface $get = null,
        ArrayObjectInterface $post = null,
        ArrayObjectInterface $server = null,
        ArrayObjectInterface $userParameters = null,
        RequestCookiesInterface $cookies = null
    ) {
        parent::__construct(
            $get ?? new ArrayObject([]),
            $post ?? new ArrayObject([]),
            $server ?? new ArrayObject([]),
            $userParameters ?? new ArrayObject([]),
            $cookies ?? RequestCookies::create([])
        );
    }
}
