<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'level',
        'duration',
        'target_audience',
        'summary',
        'syllabus',
        'price',
        'thumbnail',
        'is_featured',
        'order',
    ];

    protected $casts = [
        'syllabus' => 'array',
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
    ];
}
