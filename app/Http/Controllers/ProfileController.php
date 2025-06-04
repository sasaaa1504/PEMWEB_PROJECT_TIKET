<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

public function update(Request $request)
{
    $user = Auth::user();

    dd(get_class($user));  // untuk lihat kelas instance $user

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
    ]);

    $user->update($request->only('name', 'email'));

    return redirect()->route('dashboard.eo')->with('success', 'Profil berhasil diperbarui');
}
}
