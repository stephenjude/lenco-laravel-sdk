<?php

namespace LencoSDK\Lenco\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \LencoSDK\Lenco\Lenco
 */
class Lenco extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \LencoSDK\Lenco\Lenco::class;
    }
}
