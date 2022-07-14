<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
 

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
            'active' => 'dashboard',
            'studio' => Studio::where('user_id', auth()->user()->id)->latest()->first()
        ]);
    }

    public function adminUsers()
    {
        return view('dashboard.admin.userList',[
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'users' => User::all(),
            'studio' => Studio::where('user_id', auth()->user()->id)->latest()->first()
        ]);
    }

    public function adminCategories()
    {
        return view('dashboard.admin.categoryList',[
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'categories' => Category::all(),
            'studio' => Studio::where('user_id', auth()->user()->id)->latest()->first()
        ]);
    }

    public function becomeSeller(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'is_seller' => 'required|max:2'
        ]);
        
        User::where('id', $user->id)->update(['is_seller' => $validatedData['is_seller']]);

        if($validatedData['is_seller'] == 2)
        {
            return redirect()->intended('/dashboard')->with('success', 'Your request has been received!');
        }
        else
        {
            return redirect('/dashboard/users')->with('success', $user->name . 'has become a Studio Owner');
        }
        
    }
}
