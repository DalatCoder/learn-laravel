<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        if (auth()->check()) {
            return redirect('/home');
        }

        return view('login');
    }

    public function postLoginAdmin(Request $request): \Illuminate\Http\RedirectResponse
    {
        $remember_me = $request->has('remember_me');

        if (auth()->attempt([
            'email' => $request['email'],
            'password' => $request['password']
        ], $remember_me)) {
            return redirect()->to('/home');
        }

        return redirect()->route('login.show');
    }

    public function logoutAdmin(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.show');
    }
}
