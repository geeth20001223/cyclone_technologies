<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $attributes = [
        'title' => '',
        'category' => '',
        'quantity' => 0,
        'price' => '0',
        'discount_price' => '0',
        'image' => '',
        'screen_size' => '',
        'screen_resolution' => '',
        'screen_refresh_rate' => '',
        'device_weight' => '',
        'graphics_type' => '',
        'graphics_card_memory' => '',
        'ssd_capacity' => '',
        'operating_system' => '',
        'processor' => '',
        'processor_generation' => '',
        'processor_type' => '',
        'processor_speed' => '',
        'ram' => '',
        'keyboard' => '',
        'color' => '',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
