<?php

namespace App\Http\Middleware\Admin\Auth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role !== 'admin'){
            return redirect()->route('admin.login')->with('error', 'Bạn không có quyền truy cập nội dung này');
        }

        return $next($request);
    }
}