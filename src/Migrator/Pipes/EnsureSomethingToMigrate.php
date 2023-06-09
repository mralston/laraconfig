<?php

namespace Mralston\Laraconfig\Migrator\Pipes;

use Closure;
use Mralston\Laraconfig\Migrator\Data;
use Illuminate\Console\OutputStyle;
use RuntimeException;

class EnsureSomethingToMigrate
{
    public function __construct(protected OutputStyle $output)
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
        if ($data->metadata->isEmpty() && $data->declarations->isEmpty()) {
            throw new RuntimeException('No metadata exists in the database, and no declaration exists.');
        }

        return $next($data);
    }
}