<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view(
            'admin.users.index',
            [
                'users' => $users
            ]
        );
    }

    public function show(User $user)
    {

        return view(
            'admin.users.show',
            [
                'user' => $user
            ]
        );
    }
    public function edit(User $user)
    {

        return view(
            'admin.users.edit',
            [
                'user' => $user
            ]
        );
    }
    public function update(User $user)
    { // validate
        request()->validate([
            'role' => ['required'],
        ]);


        $user->is_editor = request('role');
        $user->save();
        return redirect('admin/users/' . $user->id);
    }
    public function destroy(User $user)
    {

        return view(
            'admin.users.user',
            [
                'user' => $user
            ]
        );
    }
}
