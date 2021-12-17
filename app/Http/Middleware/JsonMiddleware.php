<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class JsonMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $accept = $request->header('Accept');
        $contentType = $request->header('Content-type');
        if ($request->isMethod('post') && (!Str::contains($accept, 'application/json') || !Str::contains($contentType, 'application/json'))) {
            return response(['message' => 'Only JSON requests are allowed'], 406);
        }
        return $next($request);
    }
}
