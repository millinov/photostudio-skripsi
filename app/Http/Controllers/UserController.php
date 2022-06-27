<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        return view('register.formRegister', [
            "title" => 'Register',
            "active" => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required','min:5','max:255', 'unique:users'],
            'email' => ['required','email:dns','unique:users'],
            'phone_number' => ['required','min:10','max:255'],
            'password' => ['required','confirmed','min:5','max:255'],
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // session()->flash('success', 'Registration successfull! Please login');

        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }

    public function login()
    {
        return view('login.formLogin', [
            "title" => 'login',
            "active" => 'login
            '
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout()
    {
        Auth::logout();
 
        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect('/');
    }

    public function dashboard()
    {
        return view('dashboard.userPage',[
            'title' => 'Dashboard',
            'active' => 'dashboard'
        ]);
    }
}
