<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    // Memastikan hanya siswa yang dapat mengakses fitur pendaftaran
    private function cekSiswa()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== 'siswa') {
            abort(403, 'Fitur pendaftaran hanya dapat digunakan oleh siswa.');
        }

        return null;
    }

    // Menampilkan daftar ekstrakurikuler
    public function index()
    {
        $this->cekSiswa();

        $ekskuls = Ekskul::latest()->get();

        return view('pendaftaran.index', compact('ekskuls'));
    }

    // Menyimpan pendaftaran siswa
    public function store(Request $request, Ekskul $ekskul)
    {
        $this->cekSiswa();

        $validated = $request->validate([
            'catatan' => 'nullable|string|max:1000',
        ]);

        // Cek apakah siswa sudah mendaftar
        $sudahDaftar = Pendaftaran::where('user_id', Auth::id())
            ->where('ekskul_id', $ekskul->id)
            ->exists();

        if ($sudahDaftar) {
            return back()->with(
                'error',
                'Kamu sudah terdaftar di ekstrakurikuler ini.'
            );
        }

        // Simpan pendaftaran
        Pendaftaran::create([
            'user_id' => Auth::id(),
            'ekskul_id' => $ekskul->id,
            'status' => 'menunggu',
            'catatan' => $validated['catatan'] ?? null,
        ]);

        return back()->with(
            'success',
            'Pendaftaran ekstrakurikuler berhasil dikirim!'
        );
    }

    // Menampilkan pendaftaran milik siswa
    public function saya()
    {
        $this->cekSiswa();

        $pendaftarans = Pendaftaran::with('ekskul')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('pendaftaran.saya', compact('pendaftarans'));
    }

    // Membatalkan pendaftaran
    public function destroy(Pendaftaran $pendaftaran)
    {
        $this->cekSiswa();

        if ($pendaftaran->user_id != Auth::id()) {
            abort(403, 'Kamu tidak memiliki akses.');
        }

        $pendaftaran->delete();

        return redirect()->route('pendaftaran.saya')
            ->with('success', 'Pendaftaran berhasil dibatalkan.');
    }
}