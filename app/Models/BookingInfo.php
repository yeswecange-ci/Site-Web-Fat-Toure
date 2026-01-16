<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class BookingInfo extends Model
{
    use HasTranslations;

    protected $fillable = [
        'section_title',
        'description',
        'phones',
        'email',
        'is_active',
    ];

    public array $translatable = [
        'section_title',
        'description',
    ];

    protected $casts = [
        'phones' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Get the singleton instance
     */
    public static function instance(): self
    {
        return self::firstOrCreate(['id' => 1], [
            'section_title' => ['fr' => 'Booking', 'en' => 'Booking'],
            'description' => ['fr' => 'Contactez-nous pour vos projets', 'en' => 'Contact us for your projects'],
            'phones' => ['+33 X XXX XXX XX', '+225 X XXX XXX XX'],
            'email' => 'contact@fattoure.com',
        ]);
    }

    public function getPhonesFormattedAttribute(): string
    {
        if (!$this->phones) {
            return '';
        }

        return implode(' / ', $this->phones);
    }
}
