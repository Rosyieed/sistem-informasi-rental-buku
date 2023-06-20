<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlyAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // di sini kita ngasih tau apa yg harus dilakukan kalo akun yg lagi login bukan admin
        if(Auth::user()->role_id != 1){
            return redirect('/profile');
        }

        // apa yg midleware lakukan kalo akun yg login adalah admin
        return  $next($request);
    }
}
