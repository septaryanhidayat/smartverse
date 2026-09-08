<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'summary',
        'challenge',
        'solution',
        'tech_stack',
        'client_name',
        'project_url',
        'thumbnail',
        'gallery',
        'features',
        'app_type',
        'status_badge',
        'is_featured',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'tech_stack' => 'array',
            'gallery' => 'array',
            'features' => 'array',
            'is_featured' => 'boolean',
        ];
    }

    /**
     * Get normalized slider screens for interactive gallery modal
     */
    public function getSliderScreensAttribute(): array
    {
        $screens = [];

        // Main thumbnail as primary slide
        if (!empty($this->thumbnail)) {
            $screens[] = [
                'url' => $this->thumbnail,
                'title' => $this->title . ' (Tampilan Utama)',
                'type' => $this->app_type ?: 'web',
                'caption' => $this->summary ?: 'Preview tampilan produk'
            ];
        }

        // Additional gallery items
        if (!empty($this->gallery) && is_array($this->gallery)) {
            foreach ($this->gallery as $item) {
                if (is_string($item)) {
                    // Check if it's already the same as thumbnail
                    if ($item !== $this->thumbnail) {
                        $screens[] = [
                            'url' => $item,
                            'title' => $this->title . ' - Preview Layar',
                            'type' => $this->app_type ?: 'web',
                            'caption' => ''
                        ];
                    }
                } elseif (is_array($item) && !empty($item['url'])) {
                    if ($item['url'] !== $this->thumbnail) {
                        $screens[] = [
                            'url' => $item['url'],
                            'title' => !empty($item['title']) ? $item['title'] : ($this->title . ' - Preview Layar'),
                            'type' => !empty($item['type']) ? $item['type'] : ($this->app_type ?: 'web'),
                            'caption' => $item['caption'] ?? ''
                        ];
                    }
                }
            }
        }

        return $screens;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
