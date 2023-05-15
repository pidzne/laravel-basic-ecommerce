<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    use AuthenticatesUsers {
        logout as protected originalLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo() {
        if(Auth::user()->role == '1') {
            return view('admin.dashboard');
        }
        elseif(Auth::user()->role == '0') {
            return '/';
        }
    }
    
    protected function authenticated() {{
        if (Auth::user()->role == '1') {
            return redirect()->route('dashboard')->with('status', 'Chào mừng quay lại!');
        } else if (Auth::user()->role == '0') {
            return redirect()->route('home')->with('status', 'Đăng nhập thành công!');
        } else {
            return redirect('/login')->with('info', 'Vui lòng tạo 1 tài khoản!');
        }
    }}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        
    if (config('cart.destroy_on_logout')) {
            $request->session()->invalidate();
        }

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/');
    }

}
