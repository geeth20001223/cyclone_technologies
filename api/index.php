<?php

/**
 * Vercel Serverless Entry Point for Laravel
 *
 * This file handles the Vercel serverless environment setup:
 * 1. Creates writable /tmp directories (Vercel filesystem is read-only except /tmp)
 * 2. Redirects all Laravel cache/storage paths to /tmp
 * 3. Boots Laravel and handles the incoming request
 */

// Step 1: Create writable /tmp directories
$storageDirs = [
    '/tmp/storage/app/public',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/bootstrap/cache',
    '/tmp/storage/logs',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// Step 2: Redirect ALL Laravel cache/storage paths to writable /tmp
$_ENV['VERCEL'] = '1';
$_SERVER['VERCEL'] = '1';
putenv('VERCEL=1');

$_ENV['VIEW_COMPILED_PATH']  = '/tmp/storage/framework/views';
$_ENV['APP_SERVICES_CACHE']  = '/tmp/storage/bootstrap/cache/services.php';
$_ENV['APP_PACKAGES_CACHE']  = '/tmp/storage/bootstrap/cache/packages.php';
$_ENV['APP_CONFIG_CACHE']    = '/tmp/storage/bootstrap/cache/config.php';
$_ENV['APP_ROUTES_CACHE']    = '/tmp/storage/bootstrap/cache/routes.php';
$_ENV['APP_EVENTS_CACHE']    = '/tmp/storage/bootstrap/cache/events.php';
$_ENV['SESSION_DRIVER']      = 'cookie';
$_ENV['CACHE_DRIVER']        = 'array';
$_ENV['LOG_CHANNEL']         = 'stderr';

putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('APP_SERVICES_CACHE=/tmp/storage/bootstrap/cache/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/storage/bootstrap/cache/packages.php');
putenv('APP_CONFIG_CACHE=/tmp/storage/bootstrap/cache/config.php');
putenv('APP_ROUTES_CACHE=/tmp/storage/bootstrap/cache/routes.php');
putenv('APP_EVENTS_CACHE=/tmp/storage/bootstrap/cache/events.php');
putenv('SESSION_DRIVER=cookie');
putenv('CACHE_DRIVER=array');
putenv('LOG_CHANNEL=stderr');

define('LARAVEL_START', microtime(true));

// Step 3: Boot Laravel
try {
    require __DIR__ . '/../vendor/autoload.php';

    $app = require_once __DIR__ . '/../bootstrap/app.php';

    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    )->send();

    $kernel->terminate($request, $response);

} catch (\Throwable $e) {
    http_response_code(500);
    echo "<div style='padding:30px; font-family:monospace; background:#0f172a; color:#f8fafc; min-height:100vh;'>";
    echo "<h2 style='color:#ef4444;'>⚡ Vercel Deployment Error</h2>";
    echo "<p><b>Error:</b> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><b>File:</b> " . htmlspecialchars($e->getFile()) . " : Line " . $e->getLine() . "</p>";
    echo "<pre style='background:#1e293b; padding:15px; border-radius:8px; overflow-x:auto; color:#a7f3d0;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</div>";
}
