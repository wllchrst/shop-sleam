<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MemberSecurity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() == false){
            return redirect()->route('unauthorized');
        }
        else {
            $user = Auth::user();
            if($user->is_admin == true){
                return redirect()->route('unauthorized');
            }
            return $next($request);
        }
    }
}
