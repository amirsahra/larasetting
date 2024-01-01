<?php

namespace Amirsahra\Larasetting\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Larasetting
 *
 * @method static mixed getSetting(string $key = null, mixed $default = null, bool $is_active = null)
 * @method static mixed setSetting(string $key, mixed $value, bool $is_active = null)
 *
 * @package Amirsahra\Illustrator\Facade
 * @see \Amirsahra\Larasetting\
 */
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
