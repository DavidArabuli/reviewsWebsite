<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use AuthorizesRequests;
    public function show(User $user)
    {
        $reviews = $user->reviews;
        return view('profile.show', ['user' => $user, 'reviews' => $reviews]);
    }
    public function edit(User $user)
    {


        return view(
            'profile.edit',
            [
                'user' => $user
            ]
        );
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'avatar' => 'required|image|max:2048',
        ]);

        if ($user->avatar && $user->avatar !== 'avatars/avatar.png') {
            Storage::delete($user->avatar);
        }

        $path = $request->file('avatar')->store('avatars', 'public');

        $user->update([
            'avatar' => $path,
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Avatar updated successfully.',
                'avatar_url' => asset('storage/' . $path),
                'redirect_url' => route('profile.show', $user),
            ]);
        }

        return redirect()->route('profile.show', $user)
            ->with('success', 'Avatar updated!');
    }
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        Auth::logout();

        $user->delete();

        return redirect('/')->with('success', 'Your account has been deleted.');
    }
}
