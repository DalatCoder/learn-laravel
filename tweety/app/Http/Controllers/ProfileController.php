<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', [
            'user' => $user
        ]);
    }
}
