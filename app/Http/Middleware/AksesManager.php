<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Auth;
class AksesManager
{
    public function handle(Request $request, Closure $next)
    {
        $role = Auth::guard('users')->user()->role;

        if($role == 4){
            return $next($request);
        }else{
            return response()->view('errors.404', [], 404);
        }
    }
}