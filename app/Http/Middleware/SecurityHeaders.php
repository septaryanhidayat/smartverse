<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request and attach enterprise-grade security headers.
     * Prevents Clickjacking, MIME-sniffing, XSS injection, CSP violations, and sensitive info leakage.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // ══════════════════════════════════════════════════════
        // LAYER 1: Core Security Headers
        // ══════════════════════════════════════════════════════
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Cross-Origin-Opener-Policy', 'same-origin-allow-popups');
        $response->headers->set('Cross-Origin-Resource-Policy', 'cross-origin');

        // ══════════════════════════════════════════════════════
        // LAYER 2: Content Security Policy (CSP)
        // Prevents XSS by whitelisting allowed sources
        // ══════════════════════════════════════════════════════
        $csp = implode('; ', [
            "default-src 'self'",
            "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.tailwindcss.com https://cdn.jsdelivr.net https://www.googletagmanager.com https://www.google-analytics.com",
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.tailwindcss.com",
            "font-src 'self' https://fonts.gstatic.com data:",
            "img-src 'self' data: blob: https: http:",
            "connect-src 'self' https://www.google-analytics.com https://cdn.tailwindcss.com",
            "media-src 'self' https:",
            "frame-src 'self' https://www.google.com https://www.youtube.com",
            "frame-ancestors 'self'",
            "form-action 'self'",
            "base-uri 'self'",
            "object-src 'none'",
        ]);
        $response->headers->set('Content-Security-Policy', $csp);

        // ══════════════════════════════════════════════════════
        // LAYER 3: Permissions Policy (Feature Policy)
        // Restricts browser features to prevent abuse
        // ══════════════════════════════════════════════════════
        $response->headers->set('Permissions-Policy', implode(', ', [
            'camera=()',
            'microphone=()',
            'geolocation=(self)',
            'payment=()',
            'usb=()',
            'magnetometer=()',
            'gyroscope=()',
            'accelerometer=()',
            'autoplay=(self)',
            'fullscreen=(self)',
        ]));

        // ══════════════════════════════════════════════════════
        // LAYER 4: HSTS (HTTP Strict Transport Security)
        // Forces HTTPS for 1 year with subdomain coverage
        // ══════════════════════════════════════════════════════
        if ($request->isSecure() || $request->header('x-forwarded-proto') === 'https' || $request->header('x-https') === '1') {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
        }

        // ══════════════════════════════════════════════════════
        // LAYER 5: Cache Control for Admin/Sensitive Pages
        // Prevents caching of authenticated pages
        // ══════════════════════════════════════════════════════
        if ($request->is('admin/*') || $request->is('admin')) {
            $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
            $response->headers->set('Pragma', 'no-cache');
            $response->headers->set('Expires', '0');
        }

        // ══════════════════════════════════════════════════════
        // LAYER 6: Remove Revealing Server Headers
        // Prevents hacker reconnaissance of server software
        // ══════════════════════════════════════════════════════
        if (function_exists('header_remove')) {
            header_remove('X-Powered-By');
            header_remove('Server');
        }
        $response->headers->remove('X-Powered-By');
        $response->headers->remove('Server');

        return $response;
    }
}
