<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->id_role == '1') {
            $request->attributes->add(['role' => 'admin']);
        } else if ($request->user()->id_role == '2') {
            $request->attributes->add(['role'=>'user']);
        } else {
            return redirect(route('home'));
        }

        return $next($request);
    }
}
