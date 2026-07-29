<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

/**
 * Caches the full rendered HTML response for GET requests.
 * Cache is shared across all users (anonymous GET pages only).
 * It is automatically busted when any frontend model is saved/deleted
 * via the ClearsFrontendCache trait, which calls clear_frontend_cache().
 */
class CacheResponse
{
    public function handle(Request $request, Closure $next, int $minutes = 60 * 24 * 30): Response
    {
        // Only cache anonymous GET requests
        if ($request->method() !== 'GET') {
            return $next($request);
        }

        $cacheKey = 'page_html_' . sha1($request->fullUrl());

        if (Cache::has($cacheKey)) {
            return response(Cache::get($cacheKey), 200)
                ->header('Content-Type', 'text/html; charset=UTF-8')
                ->header('X-Cache', 'HIT');
        }

        $response = $next($request);

        // Only cache successful HTML responses
        if ($response->getStatusCode() === 200) {
            $content = $response->getContent();
            Cache::put($cacheKey, $content, now()->addMinutes($minutes));
            $response->header('X-Cache', 'MISS');

            // Register this key globally so clear_frontend_cache() can flush it too
            $urls = Cache::get('cached_page_urls', []);
            $urls[$cacheKey] = true;
            Cache::forever('cached_page_urls', $urls);
        }

        return $response;
    }
}
