<?php

namespace App\Http\Middleware;

use Closure;

class TrustedProxiesMiddleware
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
        if (env('SETTING_TRUSTED_PROXIES')) {
            $trustedProxies = env('SETTING_TRUSTED_PROXIES');
            if ($trustedProxies === '*') {
                $trustedProxies = '127.0.0.1,' . $request->server->get('REMOTE_ADDR');
            }
            $request->setTrustedProxies(explode(',', $trustedProxies));
        }
        return $next($request);
    }
}
