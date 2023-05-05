<?php

namespace Mralston\Laraconfig\Facades;

use Mralston\Laraconfig\Registrar\SettingRegistrar;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Support\Collection|\Mralston\Laraconfig\Eloquent\Setting[] getSettings()
 * @method static \Mralston\Laraconfig\Registrar\Declaration name(string $name)
 */
class Setting extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return SettingRegistrar::class;
    }
}