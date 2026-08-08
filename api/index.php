<?php

/**
 * Vercel Serverless Entry Point for Laravel
 * Handles read-only filesystem, redirects storage to /tmp, boots Laravel
 */

// Catch PHP fatal errors that bypass try/catch
register_shutdown_function(function () {
    $error = error_get_last();
    if ($error && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        if (!headers_sent()) {
            http_response_code(500);
            header('Content-Type: text/html');
        }
        echo "<div style='padding:30px; font-family:monospace; background:#0f172a; color:#f8fafc;'>";
        echo "<h2 style='color:#ef4444;'>⚡ PHP Fatal Error</h2>";
        echo "<p><b>Type:</b> " . $error['type'] . "</p>";
        echo "<p><b>Message:</b> " . htmlspecialchars($error['message']) . "</p>";
        echo "<p><b>File:</b> " . htmlspecialchars($error['file']) . " : Line " . $error['line'] . "</p>";
        echo "<hr><p style='color:#94a3b8;'>Env: PHP " . phpversion() . " | Vercel=" . (getenv('VERCEL') ?: 'no') . "</p>";
        echo "</div>";
    }
});

// Step 1: Create writable /tmp directories
foreach ([
    '/tmp/storage/app/public',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/bootstrap/cache',
    '/tmp/storage/logs',
] as $dir) {
    if (!is_dir($dir)) mkdir($dir, 0777, true);
}

// Step 2: Force-override ALL critical env vars for Vercel read-only filesystem
$overrides = [
    'VERCEL'              => '1',
    'VIEW_COMPILED_PATH'  => '/tmp/storage/framework/views',
    'APP_SERVICES_CACHE'  => '/tmp/storage/bootstrap/cache/services.php',
    'APP_PACKAGES_CACHE'  => '/tmp/storage/bootstrap/cache/packages.php',
    'APP_CONFIG_CACHE'    => '/tmp/storage/bootstrap/cache/config.php',
    'APP_ROUTES_CACHE'    => '/tmp/storage/bootstrap/cache/routes.php',
    'APP_EVENTS_CACHE'    => '/tmp/storage/bootstrap/cache/events.php',
    'SESSION_DRIVER'      => 'cookie',
    'CACHE_DRIVER'        => 'array',
    'LOG_CHANNEL'         => 'stderr',
    'QUEUE_CONNECTION'    => 'sync',
    'FILESYSTEM_DISK'     => 'local',
];

foreach ($overrides as $key => $value) {
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
    putenv("{$key}={$value}");
}

define('LARAVEL_START', microtime(true));

// Step 3: Verify vendor exists
if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
    echo "<div style='padding:30px; font-family:monospace; background:#0f172a; color:#f8fafc;'>";
    echo "<h2 style='color:#ef4444;'>⚡ Missing vendor/autoload.php</h2>";
    echo "<p>Composer dependencies are not installed. vendor/ folder is missing.</p>";
    echo "</div>";
    exit(0);
}

// Step 4: Boot Laravel
try {
    require __DIR__ . '/../vendor/autoload.php';

    $app = require_once __DIR__ . '/../bootstrap/app.php';

    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    )->send();

    $kernel->terminate($request, $response);

} catch (\Throwable $e) {
    if (!headers_sent()) http_response_code(500);
    echo "<div style='padding:30px; font-family:monospace; background:#0f172a; color:#f8fafc; min-height:100vh;'>";
    echo "<h2 style='color:#ef4444;'>⚡ Laravel Boot Error</h2>";
    echo "<p><b>Error:</b> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><b>File:</b> " . htmlspecialchars($e->getFile()) . " : Line " . $e->getLine() . "</p>";
    echo "<pre style='background:#1e293b; padding:15px; border-radius:8px; overflow-x:auto; color:#a7f3d0;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "<hr><p style='color:#94a3b8;'>PHP " . phpversion() . " | Session=" . ($_ENV['SESSION_DRIVER'] ?? 'unknown') . " | Cache=" . ($_ENV['CACHE_DRIVER'] ?? 'unknown') . "</p>";
    echo "</div>";
}
