<?php
// Minimal diagnostic - NO Laravel loaded
// This tells us if PHP itself is running on Vercel

echo "<div style='padding:30px; font-family:monospace; background:#0f172a; color:#f8fafc;'>";
echo "<h1 style='color:#22c55e;'>✅ PHP is Running on Vercel!</h1>";
echo "<h2>PHP Version: " . phpversion() . "</h2>";

echo "<h3>Available PHP Extensions:</h3><pre>";
echo implode(', ', get_loaded_extensions());
echo "</pre>";

echo "<h3>Environment Variables set by Vercel:</h3><pre>";
$envKeys = ['APP_KEY', 'APP_ENV', 'DB_HOST', 'DB_DATABASE', 'SESSION_DRIVER', 'CACHE_DRIVER', 'VERCEL', 'LOG_CHANNEL'];
foreach ($envKeys as $key) {
    $val = getenv($key) ?: $_ENV[$key] ?? 'NOT SET';
    // mask sensitive values
    if (in_array($key, ['APP_KEY', 'DB_PASSWORD'])) $val = '***hidden***';
    echo $key . " = " . $val . "\n";
}
echo "</pre>";

echo "<h3>Vendor autoload exists?</h3>";
echo file_exists(__DIR__ . '/../vendor/autoload.php') ? "<p style='color:#22c55e;'>✅ YES - vendor/autoload.php found!</p>" : "<p style='color:#ef4444;'>❌ NO - vendor/autoload.php MISSING!</p>";

echo "<h3>Filesystem /tmp writable?</h3>";
echo is_writable('/tmp') ? "<p style='color:#22c55e;'>✅ /tmp is writable</p>" : "<p style='color:#ef4444;'>❌ /tmp NOT writable</p>";

echo "</div>";
