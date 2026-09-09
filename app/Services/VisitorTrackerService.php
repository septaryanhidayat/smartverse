<?php

namespace App\Services;

use App\Models\DigitalProduct;
use App\Models\Post;
use App\Models\Project;
use App\Models\VisitorLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class VisitorTrackerService
{
    /**
     * Main tracking method called from middleware
     */
    public static function track(Request $request): void
    {
        try {
            $userAgent = $request->userAgent() ?? '';

            // Ignore search engine crawlers and automated bots to maintain realistic human statistics
            if (self::isBot($userAgent)) {
                return;
            }

            VisitorLog::ensureTableExists();

            $ip = self::resolveClientIp($request);
            $deviceInfo = self::parseUserAgent($userAgent);
            $trafficSource = self::parseTrafficSource($request->headers->get('referer'), $request->getHost());
            $geoInfo = self::resolveGeoLocation($ip);
            $pageTitle = self::resolvePageTitle($request);
            $sessionId = $request->session()->getId() ?? md5($ip . $userAgent);

            VisitorLog::create([
                'ip_address' => Str::limit($ip, 45, ''),
                'session_id' => Str::limit($sessionId, 100, ''),
                'device_type' => $deviceInfo['device'],
                'browser' => $deviceInfo['browser'],
                'os' => $deviceInfo['os'],
                'url' => Str::limit($request->getRequestUri(), 500, ''),
                'page_title' => Str::limit($pageTitle, 255, ''),
                'referer' => $request->headers->get('referer') ? Str::limit($request->headers->get('referer'), 1000, '') : null,
                'traffic_source' => $trafficSource,
                'country' => $geoInfo['country'],
                'city' => $geoInfo['city'],
                'user_agent' => Str::limit($userAgent, 1000, ''),
            ]);
        } catch (\Throwable $e) {
            // Silently catch any logging exceptions to guarantee zero downtime or disruption
        }
    }

    /**
     * Check if user agent is a crawler or robot
     */
    public static function isBot(string $ua): bool
    {
        if (empty($ua)) {
            return false;
        }

        $botPatterns = [
            'bot', 'crawl', 'spider', 'slurp', 'mediapartners', 'lighthouse',
            'googlebot', 'bingbot', 'yandex', 'baidu', 'duckduck', 'sogou',
            'headlesschrome', 'curl', 'wget', 'python', 'postman', 'semrush',
            'ahrefs', 'mj12bot', 'dotbot', 'petalbot'
        ];

        $uaLower = strtolower($ua);
        foreach ($botPatterns as $bot) {
            if (str_contains($uaLower, $bot)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get accurate client IP supporting Cloudflare & Reverse Proxies
     */
    public static function resolveClientIp(Request $request): string
    {
        if ($cfIp = $request->header('CF-Connecting-IP')) {
            return trim(explode(',', $cfIp)[0]);
        }

        if ($forwarded = $request->header('X-Forwarded-For')) {
            return trim(explode(',', $forwarded)[0]);
        }

        if ($realIp = $request->header('X-Real-IP')) {
            return trim($realIp);
        }

        return $request->ip() ?? '127.0.0.1';
    }

    /**
     * Parse Device, Operating System, and Browser from User-Agent
     */
    public static function parseUserAgent(string $ua): array
    {
        $device = 'Desktop';
        $browser = 'Chrome';
        $os = 'Windows';

        $uaLower = strtolower($ua);

        // 1. Device Detection
        if (preg_match('/(ipad|tablet|playbook|silk)|(android(?!.*mobile))/i', $ua)) {
            $device = 'Tablet';
        } elseif (preg_match('/(mobile|android|iphone|ipod|blackberry|opera mini|windows phone)/i', $ua)) {
            $device = 'Mobile';
        }

        // 2. OS Detection
        if (str_contains($uaLower, 'windows nt 10.0')) {
            $os = 'Windows 10/11';
        } elseif (str_contains($uaLower, 'windows nt 6.3')) {
            $os = 'Windows 8.1';
        } elseif (str_contains($uaLower, 'windows nt 6.1')) {
            $os = 'Windows 7';
        } elseif (str_contains($uaLower, 'windows')) {
            $os = 'Windows';
        } elseif (str_contains($uaLower, 'android')) {
            $os = 'Android';
        } elseif (str_contains($uaLower, 'iphone') || str_contains($uaLower, 'ipad') || str_contains($uaLower, 'ios')) {
            $os = 'iOS';
        } elseif (str_contains($uaLower, 'macintosh') || str_contains($uaLower, 'mac os x')) {
            $os = 'macOS';
        } elseif (str_contains($uaLower, 'linux')) {
            $os = 'Linux';
        } elseif (str_contains($uaLower, 'cros')) {
            $os = 'ChromeOS';
        }

        // 3. Browser Detection
        if (str_contains($uaLower, 'edg/') || str_contains($uaLower, 'edge/')) {
            $browser = 'Edge';
        } elseif (str_contains($uaLower, 'samsungbrowser')) {
            $browser = 'Samsung Internet';
        } elseif (str_contains($uaLower, 'opera') || str_contains($uaLower, 'opr/')) {
            $browser = 'Opera';
        } elseif (str_contains($uaLower, 'firefox') || str_contains($uaLower, 'fxios')) {
            $browser = 'Firefox';
        } elseif (str_contains($uaLower, 'chrome') || str_contains($uaLower, 'crios')) {
            $browser = 'Chrome';
        } elseif (str_contains($uaLower, 'safari')) {
            $browser = 'Safari';
        } elseif (str_contains($uaLower, 'ucbrowser')) {
            $browser = 'UC Browser';
        }

        return [
            'device' => $device,
            'os' => $os,
            'browser' => $browser,
        ];
    }

    /**
     * Determine Traffic Source category from referer URL
     */
    public static function parseTrafficSource(?string $referer, string $currentHost): string
    {
        if (empty($referer)) {
            return 'Langsung (Direct)';
        }

        $host = parse_url($referer, PHP_URL_HOST);
        if (empty($host) || str_contains($host, $currentHost)) {
            return 'Langsung (Direct)';
        }

        $hostLower = strtolower($host);

        if (str_contains($hostLower, 'google.')) {
            return 'Google Search';
        }
        if (str_contains($hostLower, 'yahoo.')) {
            return 'Yahoo Search';
        }
        if (str_contains($hostLower, 'bing.')) {
            return 'Bing Search';
        }
        if (str_contains($hostLower, 'wa.me') || str_contains($hostLower, 'whatsapp.')) {
            return 'WhatsApp';
        }
        if (str_contains($hostLower, 'facebook.') || str_contains($hostLower, 'fb.com')) {
            return 'Facebook';
        }
        if (str_contains($hostLower, 'instagram.')) {
            return 'Instagram';
        }
        if (str_contains($hostLower, 'linkedin.')) {
            return 'LinkedIn';
        }
        if (str_contains($hostLower, 'twitter.') || str_contains($hostLower, 't.co') || str_contains($hostLower, 'x.com')) {
            return 'Twitter / X';
        }
        if (str_contains($hostLower, 'tiktok.')) {
            return 'TikTok';
        }
        if (str_contains($hostLower, 'youtube.') || str_contains($hostLower, 'youtu.be')) {
            return 'YouTube';
        }

        return Str::limit(str_replace('www.', '', $hostLower), 30);
    }

    /**
     * Fast, cached, non-blocking Geo-IP resolver
     */
    public static function resolveGeoLocation(string $ip): array
    {
        $default = [
            'city' => 'Palembang',
            'country' => 'Indonesia',
        ];

        // Private, localhost, or reserved IPs default to home base Palembang
        if (
            $ip === '127.0.0.1' || 
            $ip === '::1' || 
            str_starts_with($ip, '192.168.') || 
            str_starts_with($ip, '10.') || 
            str_starts_with($ip, '172.16.')
        ) {
            return $default;
        }

        // Cache lookup per IP for 30 days to avoid redundant external network requests
        return Cache::remember("geoip_{$ip}", 86400 * 30, function () use ($ip, $default) {
            try {
                $response = Http::timeout(1.0)->get("http://ip-api.com/json/{$ip}?fields=status,country,city");
                if ($response->successful()) {
                    $data = $response->json();
                    if (($data['status'] ?? '') === 'success') {
                        return [
                            'city' => !empty($data['city']) ? $data['city'] : $default['city'],
                            'country' => !empty($data['country']) ? $data['country'] : $default['country'],
                        ];
                    }
                }
            } catch (\Throwable $e) {
                // If ip-api times out or fails, fallback safely
            }

            return $default;
        });
    }

    /**
     * Resolve human-readable page title from request
     */
    public static function resolvePageTitle(Request $request): string
    {
        $path = trim($request->path(), '/');

        if (empty($path)) {
            return 'Beranda';
        }

        if ($path === 'services') {
            return 'Layanan & Solusi Digital';
        }

        if ($path === 'portfolio') {
            return 'Portofolio Proyek';
        }

        if (str_starts_with($path, 'portfolio/')) {
            $slug = basename($path);
            $project = Project::where('slug', $slug)->value('title');
            return $project ? "Proyek: {$project}" : "Portofolio: {$slug}";
        }

        if ($path === 'products') {
            return 'Produk Digital Unggulan';
        }

        if (str_starts_with($path, 'products/')) {
            $slug = basename($path);
            $productName = DigitalProduct::where('slug', $slug)->value('name');
            return $productName ? "Produk: {$productName}" : "Produk: " . Str::title(str_replace('-', ' ', $slug));
        }

        if ($path === 'trainer') {
            return 'Trainer & Narasumber';
        }

        if ($path === 'blog') {
            return 'Blog & Tech Insights';
        }

        if (str_starts_with($path, 'blog/')) {
            $slug = basename($path);
            $post = Post::where('slug', $slug)->value('title');
            return $post ? "Artikel: {$post}" : "Artikel: " . Str::title(str_replace('-', ' ', $slug));
        }

        if ($path === 'contact') {
            return 'Kontak & Konsultasi';
        }

        if (str_starts_with($path, 'invoices/')) {
            return 'Verifikasi Faktur Tagihan';
        }

        return Str::title(str_replace(['-', '_', '/'], ' ', $path));
    }
}
