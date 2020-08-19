<?php

namespace App\Http\Middleware;

use App\OauthClients;
use Closure;
use Illuminate\Support\Facades\DB;

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

        $oauth_clients = OauthClients::where(['secret'=>$token])->first();
//        echo $oauth_clients;die();
        if (empty($oauth_clients)) {
            return response()->json([
                'status'=> false,
                'message' => 'Api Key Not Valid'
            ], 401);
        }
        elseif ($authorization != $app_key) {
            return response()->json([
                'status'=> false,
                'message' => 'App Key Not Valid'
            ], 401);
        }
        else {
            return $next($request);
        }

    }
}
