<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SecurityController extends Controller
{

    public function login(): View|Factory
    {
        return view('auth.login');
    }

    public function register(): View|Factory
    {
        return view('auth.register');
    }

    public function store(): RedirectResponse
    {
        request()->validate(
            ['username' => 'required|unique:users',
            'email'=> 'email|required',
            'firstName' => 'required|min:2',
            'lastName' => 'required|min:2',
            'password'=> 'required|min:4',
            ]
        );
        $user = new User();
        $user->username= request()->username;
        $user->firstName= request()->firstName;
        $user->lastName= request()->lastName;
        $user->email= request()->email;
        $user->password = Hash::make(request()->password);
        $user->save();
        return redirect()->route('auth.login');
    }

    public function authenticate(): RedirectResponse
    {
        $credentials = [
        'username' => request()->username,
        'password' => request()->password,
        ];
        if(Auth::attempt($credentials)) {
            return redirect()->route('home');
        }else{
            return redirect()->route('auth.login')->withErrors(['login'=>"Incorrect username or password"]);
        };
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }
}
