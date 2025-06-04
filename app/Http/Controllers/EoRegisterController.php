<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EoRegisterController extends Controller
{
    // Menampilkan form registrasi EO
    public function showForm()
    {
        return view('auth.eo_register'); // pastikan ini view-nya ada
    }

    // Memproses form registrasi EO
    public function submitForm(Request $request)
    {
        // Validasi input form
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|unique:users,email',
            'user_password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register-eo.form')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Simpan data user EO baru
        User::create([
            'name' => $request->user_name,
            'email' => $request->user_email,
            'password' => Hash::make($request->user_password),
            'role' => 'eo', // pastikan kolom "role" ada di tabel users
        ]);

return redirect()->route('login')->with([
    'email' => $request->email,
    'success' => 'Registrasi berhasil, silakan login.'
]);
    }
}


