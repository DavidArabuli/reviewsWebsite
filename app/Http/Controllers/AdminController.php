<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        return view(
            'admin.admin-dashboard',
            [
                $users = $this->getUsers(),
                'users' => $users,
                $editors = $this->getEditors(),
                'editors' => $editors,
            ]
        );
    }
    public function getUsers()
    {
        return User::all();
    }
    public function getEditors()
    {
        return User::where('is_editor', 1)->get();
    }
    public function user(User $user)
    {

        return view(
            'user.user',
            [
                'user' => $user
            ]
        );
    }
}
