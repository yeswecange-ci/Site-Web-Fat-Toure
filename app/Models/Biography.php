<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Biography extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    protected $fillable = [
        'section_title',
        'block1_title',
        'block1_content',
        'block1_image',
        'block2_title',
        'block2_content',
        'block2_image1',
        'block2_image2',
        'is_active',
    ];

    public array $translatable = [
        'section_title',
        'block1_title',
        'block1_content',
        'block2_title',
        'block2_content',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('block1_image')
            ->singleFile();

        $this->addMediaCollection('block2_images');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
