<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginAdmin()
    {
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
}
