<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfilSiswaController extends Controller
{
    public function index()
    {
        abort_unless(Auth::check() && Auth::user()->role === 'siswa', 403);

        return view('profil.siswa', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        abort_unless(Auth::check() && Auth::user()->role === 'siswa', 403);

        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
        ];

        if ($request->hasFile('foto_profil')) {
            $data['foto_profil'] = $request
                ->file('foto_profil')
                ->store('foto-profil', 'public');
        }

        $user->forceFill($data);
        $user->save();

        return redirect()
            ->route('profil.siswa')
            ->with('success', 'Profil berhasil diperbarui!');
    }
}