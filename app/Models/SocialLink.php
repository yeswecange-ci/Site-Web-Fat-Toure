<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = [
        'platform',
        'url',
        'icon_class',
        'order',
        'is_active',
    ];

    protected $casts = [
        'order' => 'integer',
        'is_active' => 'boolean',
    ];

    public const PLATFORMS = [
        'facebook' => 'fa-brands fa-facebook-f',
        'instagram' => 'fa-brands fa-instagram',
        'tiktok' => 'fa-brands fa-tiktok',
        'twitter' => 'fa-brands fa-x-twitter',
        'youtube' => 'fa-brands fa-youtube',
        'linkedin' => 'fa-brands fa-linkedin-in',
        'imdb' => 'fa-brands fa-imdb',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    /**
     * Get icon class based on platform
     */
    public function getIconAttribute(): string
    {
        return $this->icon_class ?: (self::PLATFORMS[$this->platform] ?? 'fa-solid fa-link');
    }
}
