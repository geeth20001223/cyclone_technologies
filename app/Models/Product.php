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
        'quantity' => '0',
        'price' => '0',
        'discount_price' => '0',
        'image' => '',
        'description' => '',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
