<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:admin,siswa,pembina',
        ]);

        $roleDipilih = $credentials['role'];

        if (!Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ])) {
            return back()
                ->withErrors([
                    'email' => 'Email atau password salah.',
                ])
                ->withInput($request->only('email', 'role'));
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // Memastikan pilihan role sesuai dengan role akun di database.
        if ($user->role !== $roleDipilih) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->withErrors([
                    'role' => 'Role yang dipilih tidak sesuai dengan akun ini.',
                ])
                ->withInput($request->only('email', 'role'));
        }

        if ($user->role === 'admin') {
            return redirect()->route('dashboard.admin')
                ->with('success', 'Login berhasil! Selamat datang Admin EKSERA.');
        }

        if ($user->role === 'pembina') {
            return redirect()->route('dashboard.pembina')
                ->with('success', 'Login berhasil! Selamat datang Pembina EKSERA.');
        }

        if ($user->role === 'siswa') {
            return redirect()->route('dashboard.siswa')
                ->with('success', 'Login berhasil! Selamat datang di EKSERA.');
        }

        Auth::logout();

        return redirect()->route('login')
            ->withErrors(['role' => 'Role akun tidak dikenali.']);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'siswa',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard.siswa')
            ->with('success', 'Registrasi berhasil! Selamat datang di EKSERA.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Kamu berhasil logout.');
    }
}