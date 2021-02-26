<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Validation\Rule;

class ProfileController extends Controller {

    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->paginate(10)
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {
        $attributes = \request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'avatar' => ['file']
        ]);

        if (! empty(\request('password')))
        {
            array_push($attributes, \request()->validate([
                'password' => ['string', 'min:8', 'confirmed']
            ]));
        }

        if (\request()->hasFile('avatar'))
        {
            $attributes['avatar'] = \request('avatar')->store('avatars');
        }

        $user->update($attributes);

        return redirect($user->path());
    }

}
