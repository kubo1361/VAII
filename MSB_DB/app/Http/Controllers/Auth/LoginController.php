<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /*
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        dd('here');
        if (Auth::attempt($credentials)) {
            if (auth()->user()->enabled) {
                $this->redirectTo();
            } else {
                return response()->caps('YOU HAVE BEEN BANNED');
            }
        }
    }
    */

    protected function redirectTo()
    {
        return 'profile/'.auth()->user()->id;
    }
}
