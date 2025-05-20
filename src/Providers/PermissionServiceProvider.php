<?php

namespace MahdiawanNK\PermissionGroup\Providers;//use Illuminate\Support\ServiceProvider;

use Illuminate\Support\ServiceProvider;
// use MahdiawanNK\PermissionGroup\Commands\PermissionSyncCommand;

class PermissionServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // $this->commands([
            //     PermissionSyncCommand::class,
            // ]);

            $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        }
    }
}