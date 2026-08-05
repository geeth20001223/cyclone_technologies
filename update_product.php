<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$p = \App\Models\Product::where('id', 1)->first();
if ($p) {
    $p->image = '1721243123.png';
    $p->save();
    echo "Updated product 1\n";
} else {
    echo "Product 1 not found\n";
}
