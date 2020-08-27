<?php

namespace App\Http\Middleware;

use App\OauthAccessToken;
use App\User;
use Closure;

class CheckUser
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
        $id = $request->header('USER_ID');
        $api_token = $request->header('API_TOKEN');
        $user =  OauthAccessToken::where([
            ['user_id', '=', $id],['remember_token', '=', $api_token],
        ])->first();
        if (!empty($user)){
            return $next($request);
        }
        else{
            return response()->json([
                'status'=> false,
                'message' => 'Un Authorized User OR Token'
            ], 401);
        }

    }
}
