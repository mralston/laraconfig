<?php

namespace Mralston\Laraconfig\Migrator\Pipes;

use Closure;
use Mralston\Laraconfig\Migrator\Data;
use Mralston\Laraconfig\Registrar\SettingRegistrar;

/**
 * @internal
 */
class LoadDeclarations
{
    /**
     * LoadDeclarations constructor.
     *
     * @param  \Mralston\Laraconfig\Registrar\SettingRegistrar  $registrar
     */
    public function __construct(protected SettingRegistrar $registrar)
    {
    }

    /**
     * Handles the Settings migration.
     *
     * @param  \Mralston\Laraconfig\Migrator\Data  $data
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle(Data $data, Closure $next): mixed
    {
        $this->registrar->loadDeclarations();

        // We won't overload the declarations if the data is not empty.
        $data->declarations = $this->registrar->getDeclarations();

        return $next($data);
    }
}