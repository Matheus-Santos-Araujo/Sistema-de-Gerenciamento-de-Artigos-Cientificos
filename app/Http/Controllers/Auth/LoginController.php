<?php

namespace App\Http\Controllers\Auth;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Request;
use App\aluno;
use App\professor;
use Illuminate\Support\Facades\Session;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate()
    {
        $credentials = Request::only('email', 'password');
        //$request->email = Request::input('email');
        //$request->senha = Request::input('password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('welcome');
        } else { return view('auth/login'); }
    }

    public function logout(){	
	    Auth::logout();
	    Session::flush();
	    return redirect('/login');
    }
}
