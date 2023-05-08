<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;

class GzipMiddleware 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (! $response instanceof Response || $response->isRedirection() || $response->headers->has('Content-Encoding')) {
            return $response;
        }

        $encoding = $request->server('HTTP_ACCEPT_ENCODING');

        if (strpos($encoding, 'gzip') === false) {
            return $response;
        }

        $response->setContent(gzencode($response->getContent(), 9));
        $response->headers->set('Content-Encoding', 'gzip');
        $response->headers->set('Vary', 'Accept-Encoding');

        return $response;
    }
}
