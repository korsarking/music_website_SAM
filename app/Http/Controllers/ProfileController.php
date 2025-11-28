<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

public function index()
    {
        return view('profile.index');
    }
public function update(Request $request)
    {
    $user = auth()->user();

        $validated = $request->validate([
            'name'              => 'required|string|max:255',
            'username'          => 'required|string|max:255|unique:users,username,' . $user->id,
            'about'             => 'nullable|string|max:1000',
            'country'           => 'nullable|string|size:2',
            'social_twitter'    => 'nullable|string|max:255',
            'social_instagram'  => 'nullable|string|max:255',
            'social_youtube'    => 'nullable|url|max:255',
            'social_website'    => 'nullable|url|max:255',
            'avatar'            => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('avatar')) {

            if ($user->avatar_slug) {
                Storage::disk('public')->delete('avatars/' . $user->avatar_slug);
            }

            $file = $request->file('avatar');
            $filename = $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('avatars', $filename, 'public');

            $validated['avatar_slug'] = $filename;
        }

        $user->update($validated);

        return back()->with('success', 'Profile updated successfully!');
    }
}
