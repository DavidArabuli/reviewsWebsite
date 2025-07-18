<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        // validate
        $attributes = request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(5), 'confirmed'],

            'avatar' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048'

        ]);
        // create
        if (request()->hasFile('avatar')) {
            $attributes['avatar'] = request()->file('avatar')->store('avatars', 'public');
        }
        $user = User::create($attributes);
        // login
        Auth::login($user);
        // redirect
        return redirect('/reviews');
        // dd(request()->all());
    }
}
