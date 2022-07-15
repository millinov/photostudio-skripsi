<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
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


    public function showLoginForm()
    {
        return view('auth.login', [
            "title" => 'login',
            "active" => 'login'
        ]);
    }
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

    //google login
    public function redirectToGoogle()
    {
        return socialite::driver('google')->redirect();
    }

    //google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')
        ->with(['redirect_uri' => '/laravel-socialite/public/login/google/callback'])
        ->stateless()
        ->user();

        $this->_registerOrLoginUser($user);

        //return
        return redirect('/dashboard');
    }

    protected function _registerOrLoginUser($data)
    { 
        $user = User::where('email', '=', $data->email)->first();
        if(!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->username = $data->name;
            $user->phone_number = '-';
            $user->provider_id = $data->id;
            $user->save();
        }
        Auth::login($user);
        
    }

}
