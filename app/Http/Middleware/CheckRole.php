<?php

namespace App\Http\Middleware;

use App\RoleUser;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
//        echo Auth::user()->getAuthIdentifier(); die();
        $id= Auth::user()->getAuthIdentifier();
        $us= RoleUser::where('user_id', $id)->first();
        if ($us) {
            if (!$request->user()->hasRole($role)) {
                return redirect('dashboard');
            }
        }
        else{
            //logout user
            auth()->logout();
            // redirect to homepage
            return redirect('login')->with('delete', 'Not Authorized');
        }
        return $next($request);
    }
}
