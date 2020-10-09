<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()                 // yaha redirectTo() vanni method lai overwrite gareko ho
    {
        if(\Auth::user()->role=="admin")
        {
            //return redirect()->route('admin');
            return '/admin';
        } 

        if(\Auth::user()->role=="manager")
        {
            //return redirect()->route('manager');
            return '/manager';
        }

        if(\Auth::user()->role=="user")
        {
            //return redirect()->route('user');
            return '/user';
        }
    }

    
}
