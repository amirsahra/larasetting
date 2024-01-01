<?php

namespace Amirsahra\Larasetting\Facades;

use Illuminate\Support\Facades\Facade;

class Larasetting extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'Larasetting';
    }
}
