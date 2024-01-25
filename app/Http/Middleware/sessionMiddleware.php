<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
class sessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        if($roles === 'admin' && $this->isAdmin()){
            return $this->callAdminFunction();
        }

        return redirect('/');
    }
    private function isAdmin()
    {
        return Session::get('userLog.role') === 'admin';
    }

    // Function to check if the user is a client (Replace this with your logic)
    private function isClient()
    {
        return Session::get('userLog.role') === 'client';
    }


    private function callAdminFunction()
    {
        return redirect('/dashboard');
    }

    // Function to execute for client
    private function callClientFunction()
    {

    }

}
