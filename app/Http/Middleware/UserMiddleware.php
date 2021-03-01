<?php

namespace App\Http\Middleware;
use Closure;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;


class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
          ///User banned and Unbanned
          if(Auth::check() && Auth::user()->isban){
            $banned = Auth::user()->isban == '1';
            Auth::logout();
            if($banned == 1){
                $message = 'Your Account has been Banned. Please contact with administration.';
            }
            return redirect()->route('login')->with('status',$message)->withErrors([
                'banned' => 'Your Account has been banned. Please Contact with admin',
            ]);
        }

        ///////// User Active Inactive MiddleWare
        if(Auth::check()){
            $expireTime = Carbon::now()->addSeconds(30);
            Cache::put('user-is-online' . Auth::user()->id, true, $expireTime);
            User::where('id',Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        }
/////////////////////////////////////////User and Admin Middleware//////////////////////////////////////
        if (Auth::check() && Auth::user()->role_id==2) {
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }
}
