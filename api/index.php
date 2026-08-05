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

putenv('VERCEL=1');
$_ENV['VERCEL'] = '1';
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    http_response_code(500);
    echo "<div style='padding:20px; font-family:sans-serif; background:#0f172a; color:#f8fafc; min-height:100vh;'>";
    echo "<h2 style='color:#ef4444;'>⚡ Vercel Deployment Error Diagnostic</h2>";
    echo "<p style='font-size:16px;'><strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p style='font-size:14px; color:#cbd5e1;'><strong>File:</strong> " . htmlspecialchars($e->getFile()) . " : Line " . $e->getLine() . "</p>";
    echo "<pre style='background:#1e293b; padding:15px; border-radius:8px; overflow-x:auto; font-size:12px; color:#a7f3d0;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</div>";
}
