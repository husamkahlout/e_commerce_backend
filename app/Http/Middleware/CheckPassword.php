<?php

namespace App\Http\Middleware;

use Closure;

class CheckPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {                                                   // هذه القيمة هي الإفتراضية إذا ما جاب ال API_PASSWORD
        if($request->api_password != env("API_PASSWORD", "56dw2SFOCQo1luRU")) {
            return response()->json(['message', 'Unauthenticated']);
        }

        return $next($request);
    }
}
