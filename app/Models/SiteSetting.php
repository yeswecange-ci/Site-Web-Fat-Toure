<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SiteSetting extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    protected $fillable = [
        'site_name',
        'site_title',
        'site_description',
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'meta_image',
    ];

    public array $translatable = [
        'site_name',
        'site_title',
        'site_description',
        'hero_title',
        'hero_subtitle',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('hero')
            ->singleFile();

        $this->addMediaCollection('meta')
            ->singleFile();
    }

    /**
     * Get the singleton instance
     */
    public static function instance(): self
    {
        return self::firstOrCreate(['id' => 1], [
            'site_name' => ['fr' => 'Fat Touré', 'en' => 'Fat Touré'],
            'site_title' => ['fr' => 'Actrice', 'en' => 'Actress'],
            'site_description' => ['fr' => 'Portfolio officiel', 'en' => 'Official portfolio'],
            'hero_title' => ['fr' => 'Bienvenue sur le site de Fat Touré', 'en' => 'Welcome to Fat Touré\'s website'],
            'hero_subtitle' => ['fr' => 'Actrice', 'en' => 'Actress'],
        ]);
    }
}
