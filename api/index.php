<?php

// Enable full error reporting for diagnostic debugging on Vercel
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Prepare writable storage directories in /tmp for Vercel Serverless environment
$storageDirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/cache',
    '/tmp/storage/bootstrap/cache',
    '/tmp/storage/logs',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
}

// Redirect all Laravel cache & bootstrap files to writable /tmp
putenv('VERCEL=1');
$_ENV['VERCEL'] = '1';

putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

putenv('APP_SERVICES_CACHE=/tmp/storage/bootstrap/cache/services.php');
$_ENV['APP_SERVICES_CACHE'] = '/tmp/storage/bootstrap/cache/services.php';

putenv('APP_PACKAGES_CACHE=/tmp/storage/bootstrap/cache/packages.php');
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/storage/bootstrap/cache/packages.php';

putenv('APP_CONFIG_CACHE=/tmp/storage/bootstrap/cache/config.php');
$_ENV['APP_CONFIG_CACHE'] = '/tmp/storage/bootstrap/cache/config.php';

putenv('APP_ROUTES_CACHE=/tmp/storage/bootstrap/cache/routes.php');
$_ENV['APP_ROUTES_CACHE'] = '/tmp/storage/bootstrap/cache/routes.php';

putenv('APP_EVENTS_CACHE=/tmp/storage/bootstrap/cache/events.php');
$_ENV['APP_EVENTS_CACHE'] = '/tmp/storage/bootstrap/cache/events.php';

define('LARAVEL_START', microtime(true));

try {
    if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
        throw new Exception("vendor/autoload.php not found. Composer dependencies missing.");
    }

    require __DIR__ . '/../vendor/autoload.php';

    $app = require_once __DIR__ . '/../bootstrap/app.php';

    // Set storage path to writable /tmp directory on Vercel
    $app->useStoragePath('/tmp/storage');

    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    )->send();

    $kernel->terminate($request, $response);
} catch (\Throwable $e) {
    http_response_code(500);
    echo "<div style='padding:30px; font-family:sans-serif; background:#0f172a; color:#f8fafc; min-height:100vh;'>";
    echo "<h2 style='color:#ef4444;'>⚡ Vercel Deployment Error Diagnostic</h2>";
    echo "<p style='font-size:16px;'><strong>Error:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p style='font-size:14px; color:#cbd5e1;'><strong>File:</strong> " . htmlspecialchars($e->getFile()) . " : Line " . $e->getLine() . "</p>";
    echo "<pre style='background:#1e293b; padding:15px; border-radius:8px; overflow-x:auto; font-size:12px; color:#a7f3d0;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</div>";
}
