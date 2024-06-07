<?php

namespace Jacobfitzp\NovaTinymce\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Ensure the response is JSON by overriding the Accept header.
 *
 * @author Jacob Fitzpatrick
 */
class ForceJsonResponse
{
    public function handle(Request $request, Closure $next): mixed
    {
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}
