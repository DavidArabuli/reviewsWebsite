<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $reviews = $user->reviews;
        return view('users.profile', ['user' => $user, 'reviews' => $reviews]);
    }
}
