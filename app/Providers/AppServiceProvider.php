<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production' || 
            (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
            (!in_array(request()->getHost(), ['127.0.0.1', 'localhost']))) {
            URL::forceScheme('https');
        }

        // Auto-create SQLite database file if missing to prevent SQLiteDatabaseDoesNotExistException
        if (config('database.default') === 'sqlite') {
            $sqlitePath = config('database.connections.sqlite.database');
            if ($sqlitePath && !file_exists($sqlitePath)) {
                @mkdir(dirname($sqlitePath), 0755, true);
                @touch($sqlitePath);
            }
        }
    }
}
