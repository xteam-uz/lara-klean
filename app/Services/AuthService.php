<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthService
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function loginPost($request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function registerPost($request): RedirectResponse
    {
        $userData = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $userData['password'] = bcrypt($userData['password']);

        $user = User::create($userData);

        Auth::login($user, true);

        return redirect()->route('main');
    }

    public function logout($request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('main');
    }
}
