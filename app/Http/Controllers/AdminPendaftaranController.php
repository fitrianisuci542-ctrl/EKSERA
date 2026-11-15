<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AdminPendaftaranController extends Controller
{
    // Memastikan hanya admin yang dapat mengakses
    private function cekAdmin()
    {
        abort_unless(
            auth()->check() && auth()->user()->role === 'admin',
            403,
            'Halaman ini hanya dapat diakses oleh admin.'
        );
    }

    // Menampilkan data pendaftaran
    public function index()
    {
        $this->cekAdmin();

        $pendaftarans = Pendaftaran::with(['user', 'ekskul'])
            ->latest()
            ->get();

        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    // Mengubah status pendaftaran
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $this->cekAdmin();

        $validated = $request->validate([
            'status' => 'required|in:menunggu,diterima,ditolak',
        ]);

        $pendaftaran->update($validated);

        return redirect()
            ->route('admin.pendaftaran.index')
            ->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    // Menghapus data pendaftaran
    public function destroy(Pendaftaran $pendaftaran)
    {
        $this->cekAdmin();

        $pendaftaran->delete();

        return redirect()
            ->route('admin.pendaftaran.index')
            ->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}