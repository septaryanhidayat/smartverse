<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'badge',
        'tagline',
        'description',
        'features',
        'price',
        'price_type',
        'demo_url',
        'buy_url',
        'thumbnail',
        'is_featured',
        'order',
    ];

    protected $casts = [
        'features' => 'array',
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
