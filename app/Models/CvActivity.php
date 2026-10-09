<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'cv_profile_id',
        'type',
        'title',
        'category',
        'organizer',
        'year',
        'event_date',
        'location',
        'url',
        'description',
        'flyer_path',
        'pdf_path',
        'is_featured',
        'show_in_print',
        'order',
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_featured' => 'boolean',
        'show_in_print' => 'boolean',
        'order' => 'integer',
    ];

    public function profile()
    {
        return $this->belongsTo(CvProfile::class, 'cv_profile_id');
    }

    public function scopeSpeakers($query)
    {
        return $query->where('type', 'speaker')->orderBy('order')->orderBy('year', 'desc');
    }

    public function scopeProjects($query)
    {
        return $query->where('type', 'project')->orderBy('order')->orderBy('year', 'desc');
    }

    public function scopePrintable($query)
    {
        return $query->where('show_in_print', true)->orderBy('order');
    }

    public function getHasFlyerAttribute(): bool
    {
        return !empty($this->flyer_path);
    }

    public function getHasPdfAttribute(): bool
    {
        return !empty($this->pdf_path);
    }
}
