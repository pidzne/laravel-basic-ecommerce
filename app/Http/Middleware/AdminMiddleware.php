<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (Auth::check()) { // check user đã đăng nhập hay chưa
            if (Auth::user()->role=='1') { // check user có vai trò là admin hay không
                return $next($request);
            } else {
                return redirect('/')->with('info', 'Chỉ quản trị viên mới có thể truy cập trang này!');
            }
        } else {
            return redirect('/')->with('status', 'Vui lòng đăng nhập!');
        }
    }
}
