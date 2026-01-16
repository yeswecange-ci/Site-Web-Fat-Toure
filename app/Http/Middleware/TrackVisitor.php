<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only track if cookies are accepted
        if ($request->cookie('cookies_accepted') !== 'true') {
            return $response;
        }

        // Skip admin routes
        if ($request->is('admin/*') || $request->is('admin')) {
            return $response;
        }

        // Skip AJAX requests
        if ($request->ajax()) {
            return $response;
        }

        // Skip non-GET requests
        if (!$request->isMethod('GET')) {
            return $response;
        }

        $ip = $request->ip();

        // Check for duplicate visits (same IP within last 30 minutes)
        $recentVisit = Visitor::where('ip_address', $ip)
            ->where('created_at', '>=', now()->subMinutes(30))
            ->exists();

        if ($recentVisit) {
            return $response;
        }

        // Get geolocation data
        $geoData = Visitor::getGeoLocation($ip);

        // Parse user agent
        $userAgent = $request->userAgent();
        $deviceInfo = $this->parseUserAgent($userAgent);

        // Record the visit
        Visitor::create([
            'ip_address' => $ip,
            'country' => $geoData['country'],
            'country_code' => $geoData['country_code'],
            'city' => $geoData['city'],
            'region' => $geoData['region'],
            'latitude' => $geoData['latitude'],
            'longitude' => $geoData['longitude'],
            'device_type' => $deviceInfo['device_type'],
            'browser' => $deviceInfo['browser'],
            'browser_version' => $deviceInfo['browser_version'],
            'platform' => $deviceInfo['platform'],
            'platform_version' => $deviceInfo['platform_version'],
            'user_agent' => $userAgent,
            'referer' => $request->header('referer'),
            'page_visited' => $request->path(),
        ]);

        return $response;
    }

    /**
     * Parse user agent string to extract device, browser, and platform info
     */
    private function parseUserAgent(?string $userAgent): array
    {
        $result = [
            'device_type' => 'Desktop',
            'browser' => null,
            'browser_version' => null,
            'platform' => null,
            'platform_version' => null,
        ];

        if (!$userAgent) {
            return $result;
        }

        // Detect device type
        if (preg_match('/Mobile|Android.*Mobile|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i', $userAgent)) {
            $result['device_type'] = 'Mobile';
        } elseif (preg_match('/iPad|Android(?!.*Mobile)|Tablet/i', $userAgent)) {
            $result['device_type'] = 'Tablet';
        }

        // Detect browser
        $browsers = [
            'Edge' => '/Edge\/(\d+\.?\d*)/i',
            'Opera' => '/OPR\/(\d+\.?\d*)/i',
            'Chrome' => '/Chrome\/(\d+\.?\d*)/i',
            'Safari' => '/Version\/(\d+\.?\d*).*Safari/i',
            'Firefox' => '/Firefox\/(\d+\.?\d*)/i',
            'IE' => '/MSIE (\d+\.?\d*)|Trident.*rv:(\d+\.?\d*)/i',
        ];

        foreach ($browsers as $browser => $pattern) {
            if (preg_match($pattern, $userAgent, $matches)) {
                $result['browser'] = $browser;
                $result['browser_version'] = $matches[1] ?? ($matches[2] ?? null);
                break;
            }
        }

        // Detect platform
        $platforms = [
            'Windows' => '/Windows NT (\d+\.?\d*)/i',
            'macOS' => '/Mac OS X (\d+[._]\d+[._]?\d*)/i',
            'iOS' => '/iPhone OS (\d+[._]\d+)/i',
            'Android' => '/Android (\d+\.?\d*)/i',
            'Linux' => '/Linux/i',
        ];

        foreach ($platforms as $platform => $pattern) {
            if (preg_match($pattern, $userAgent, $matches)) {
                $result['platform'] = $platform;
                $result['platform_version'] = isset($matches[1]) ? str_replace('_', '.', $matches[1]) : null;
                break;
            }
        }

        return $result;
    }
}
