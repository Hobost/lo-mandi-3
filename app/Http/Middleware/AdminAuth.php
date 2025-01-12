<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admin')->check() && ($request->is('admin/login') || $request->is('admin/register'))) {
            return redirect()->route('admin.index')->with(['error' => 'Already logged in.']); 
        }

        if (!Auth::guard('admin')->check() && !$request->is('admin/login') && !$request->is('admin/register')) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Please login to access this page.']);
        }

        return $next($request);
    }
}
