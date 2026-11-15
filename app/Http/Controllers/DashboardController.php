<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class DashboardController extends Controller
{
    // Mengambil data event untuk semua dashboard
    private function dataDashboard()
    {
        $events = Event::orderBy('tanggal', 'asc')
            ->orderBy('jam_mulai', 'asc')
            ->get();

        return compact('events');
    }

    // Mengarahkan pengguna sesuai role
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $role = Auth::user()->role;

        if ($role === 'admin') {
            return redirect()->route('dashboard.admin');
        }

        if ($role === 'pembina') {
            return redirect()->route('dashboard.pembina');
        }

        if ($role === 'siswa') {
            return redirect()->route('dashboard.siswa');
        }

        abort(403, 'Role akun tidak dikenali.');
    }

    // Dashboard Admin
    public function admin()
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'admin',
            403,
            'Akses ditolak! Halaman ini hanya untuk Admin.'
        );

        return view('dashboard.admin', $this->dataDashboard());
    }

    // Dashboard Pembina
    public function pembina()
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'pembina',
            403,
            'Akses ditolak! Halaman ini hanya untuk Pembina.'
        );

        return view('dashboard.pembina', $this->dataDashboard());
    }

    // Dashboard Siswa
    public function siswa()
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'siswa',
            403,
            'Akses ditolak! Halaman ini hanya untuk Siswa.'
        );

        return view('dashboard.siswa', $this->dataDashboard());
    }
}