<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function register()
    {
        return view("auth.register");
    } 

    public function registerPost(RegisterRequest $req)
    {
        $user = User::create([
                'name' => $req->name,
                'username' => $req->username ?? Str::slug($req->name) . '-' . Str::random(4),
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'country' => $req->country,
                'role' => 0,
            ]);

        Auth::login($user);

        return redirect()->route('home');
    }
    
    public function loginPost(LoginRequest $request)
    {
        $credentials = $request->only('login', 'password');
        $field = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$field => $credentials['login'], 'password' => $credentials['password']], $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'login' => 'Invalid credentials. Username or password is incorrect.',
        ])->onlyInput('login');
    }

    public function logout(Request $req)
    {
        Auth::logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect()->route('home');
    }
}
