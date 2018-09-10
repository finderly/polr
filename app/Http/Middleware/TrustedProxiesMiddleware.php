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
          $request->setTrustedProxies(explode(',', env('SETTING_TRUSTED_PROXIES')));
        }
        return $next($request);
    }
}
