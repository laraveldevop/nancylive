<?php

namespace App\Http\Middleware;

use Closure;

class AuthKey
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
        $token = $request->header('API_KEY');
        $authorization = $request->header('Authorization');
        $app_key = config('app.key');
        if($token != 'kkcoswggwgwkkc8w4ok808o48kswc40c0www4wss') {
            return response()->json([
                'message' => 'Api Key Not Valid'
            ], 401);
        }
        if ($authorization != $app_key) {
            return response()->json([
                'message' => 'Un Authorized'
            ], 401);
        }

        return $next($request);
    }
}
