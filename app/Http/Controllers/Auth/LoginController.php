<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;


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
    protected $redirectTo = '/';


    public function showForm(){
        return view('auth.new_login');
    }

    public function login(Request $r){
        $this->validate($r,[
                    'username' => 'required',
                    'password' => 'required'
                ]);
        if(\Auth::attempt([
            'username' => $r->username,
            'password' => $r->password
        ])){

            $role = \Auth::user()->role;

            switch ($role) {
                case 'administrator':
                    return redirect('/');
                    break;
                
                case 'operator':
                    return redirect('/');
                    break;
            }
        }

        return redirect()->route('auth.form')->with('error','Username / password yang anda masukkan salah');

    }

    public function logout(){
        if(\Auth::check()){
            \Auth::logout();
            return redirect()->route('auth.form')->with('success','Berhasil log out. Sampai jumpa lagi.');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
