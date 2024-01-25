<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
class sessionAndRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    public function isAdmin(Request $request, Closure $next){
        // if(Session::has('userLog')){
        //     if(Session::get('userLog.role')==="admin"){
        //         return $next($request);
        //     }
        //     return redirect('/');
        // }
        return redirect('/');
    }
}
