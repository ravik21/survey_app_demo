<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\User;
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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => ['required','min:6'],
        ];

        $request->validate($rules);

        $user = User::where('email',$request->email)->first();

        if(!$user){
          return redirect('/login')->with('fail', 'no user found');
        }

        if($user && !$user->password){
          return redirect('/login')->with('social-msg','Please reset your password');
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user->last_activity = Carbon::now();
            $user->save();
            return redirect('/');
        } else {
            return redirect('/login')->with('fail', 'invalid credentials');;
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    protected function loggedOut(Request $request)
    {
        //
    }
}
