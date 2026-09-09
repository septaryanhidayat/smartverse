<?php

namespace App\Http\Middleware;

use App\Services\VisitorTrackerService;
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

        // Only track successful GET requests on public-facing pages
        if ($request->isMethod('GET') && $this->shouldTrack($request)) {
            VisitorTrackerService::track($request);
        }

        return $response;
    }

    /**
     * Determine whether the current request path should be tracked
     */
    protected function shouldTrack(Request $request): bool
    {
        $path = $request->path();

        // Skip administrative, internal, and system routes
        $excludedPrefixes = [
            'admin',
            'api',
            'up',
            '_debugbar',
            'livewire',
            'telescope',
            'horizon',
            'sanctum',
        ];

        foreach ($excludedPrefixes as $prefix) {
            if ($request->is($prefix) || $request->is("{$prefix}/*")) {
                return false;
            }
        }

        // Skip common static asset requests if routed through framework
        $excludedExtensions = ['css', 'js', 'jpg', 'jpeg', 'png', 'gif', 'svg', 'webp', 'ico', 'woff', 'woff2', 'ttf', 'xml', 'txt'];
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        if (in_array($extension, $excludedExtensions, true)) {
            return false;
        }

        return true;
    }
}
