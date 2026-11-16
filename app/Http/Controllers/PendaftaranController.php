<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    // Memastikan hanya siswa yang dapat menggunakan fitur pendaftaran
    private function cekSiswa()
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'siswa',
            403,
            'Fitur pendaftaran hanya dapat digunakan oleh siswa.'
        );
    }

    // Menampilkan daftar ekstrakurikuler
    public function index()
    {
        $this->cekSiswa();

        $ekskuls = Ekskul::latest()->get();

        return view('pendaftaran.index', compact('ekskuls'));
    }

    // Menyimpan pendaftaran ekstrakurikuler
    public function store(Request $request, Ekskul $ekskul)
    {
        $this->cekSiswa();

        // Validasi catatan
        $validated = $request->validate([
            'catatan' => 'nullable|string|max:500',
        ]);

        // VALIDASI ANTI-DUPLIKASI
        // Memeriksa apakah siswa sudah mendaftar ekstrakurikuler yang sama
        $duplikat = Pendaftaran::where('user_id', Auth::id())
            ->where('ekskul_id', $ekskul->id)
            ->exists();

        if ($duplikat) {
            return back()
                ->withInput()
                ->with('error', 'Kamu sudah terdaftar pada ekstrakurikuler ini!');
        }

        // Menyimpan data pendaftaran jika belum terdaftar
        Pendaftaran::create([
            'user_id' => Auth::id(),
            'ekskul_id' => $ekskul->id,
            'status' => 'menunggu',
            'catatan' => $validated['catatan'] ?? null,
        ]);

        return redirect()
            ->route('pendaftaran.saya')
            ->with('success', 'Pendaftaran ekstrakurikuler berhasil dikirim!');
    }

    // Menampilkan pendaftaran milik siswa yang sedang login
    public function saya()
    {
        $this->cekSiswa();

        $pendaftarans = Pendaftaran::with('ekskul')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('pendaftaran.saya', compact('pendaftarans'));
    }

    // Menghapus pendaftaran milik siswa sendiri
    public function destroy(Pendaftaran $pendaftaran)
    {
        $this->cekSiswa();

        abort_unless(
            $pendaftaran->user_id == Auth::id(),
            403,
            'Kamu tidak dapat menghapus pendaftaran milik siswa lain.'
        );

        $pendaftaran->delete();

        return redirect()
            ->route('pendaftaran.saya')
            ->with('success', 'Pendaftaran berhasil dibatalkan.');
    }
}