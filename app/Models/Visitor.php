<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Visitor extends Model
{
    protected $fillable = [
        'ip_address',
        'country',
        'country_code',
        'city',
        'region',
        'latitude',
        'longitude',
        'device_type',
        'browser',
        'browser_version',
        'platform',
        'platform_version',
        'user_agent',
        'referer',
        'page_visited',
    ];

    protected $casts = [
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    /**
     * Get geolocation data from IP address
     */
    public static function getGeoLocation(string $ip): array
    {
        // Skip for localhost
        if (in_array($ip, ['127.0.0.1', '::1', 'localhost'])) {
            return [
                'country' => 'Local',
                'country_code' => 'LC',
                'city' => 'Localhost',
                'region' => 'Development',
                'latitude' => null,
                'longitude' => null,
            ];
        }

        try {
            // Using ip-api.com (free, no API key required, 45 requests/minute)
            $response = Http::timeout(5)->get("http://ip-api.com/json/{$ip}");

            if ($response->successful()) {
                $data = $response->json();

                if ($data['status'] === 'success') {
                    return [
                        'country' => $data['country'] ?? null,
                        'country_code' => $data['countryCode'] ?? null,
                        'city' => $data['city'] ?? null,
                        'region' => $data['regionName'] ?? null,
                        'latitude' => $data['lat'] ?? null,
                        'longitude' => $data['lon'] ?? null,
                    ];
                }
            }
        } catch (\Exception $e) {
            // Log error silently
            \Log::warning('Geolocation lookup failed: ' . $e->getMessage());
        }

        return [
            'country' => null,
            'country_code' => null,
            'city' => null,
            'region' => null,
            'latitude' => null,
            'longitude' => null,
        ];
    }

    /**
     * Scope for today's visitors
     */
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    /**
     * Scope for this week's visitors
     */
    public function scopeThisWeek($query)
    {
        return $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
    }

    /**
     * Scope for this month's visitors
     */
    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', now()->month)
                     ->whereYear('created_at', now()->year);
    }

    /**
     * Get unique visitors count
     */
    public static function uniqueVisitors($period = 'all')
    {
        $query = self::query();

        switch ($period) {
            case 'today':
                $query->today();
                break;
            case 'week':
                $query->thisWeek();
                break;
            case 'month':
                $query->thisMonth();
                break;
        }

        return $query->distinct('ip_address')->count('ip_address');
    }

    /**
     * Get visitors by country
     */
    public static function byCountry($limit = 10)
    {
        return self::selectRaw('country, country_code, COUNT(*) as count')
            ->whereNotNull('country')
            ->groupBy('country', 'country_code')
            ->orderByDesc('count')
            ->limit($limit)
            ->get();
    }

    /**
     * Get visitors by device type
     */
    public static function byDeviceType()
    {
        return self::selectRaw('device_type, COUNT(*) as count')
            ->whereNotNull('device_type')
            ->groupBy('device_type')
            ->orderByDesc('count')
            ->get();
    }

    /**
     * Get visitors by browser
     */
    public static function byBrowser($limit = 5)
    {
        return self::selectRaw('browser, COUNT(*) as count')
            ->whereNotNull('browser')
            ->groupBy('browser')
            ->orderByDesc('count')
            ->limit($limit)
            ->get();
    }
}
