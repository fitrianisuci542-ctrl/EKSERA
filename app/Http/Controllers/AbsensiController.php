<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    private function cekPembina()
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'pembina',
            403,
            'Fitur absensi hanya dapat diakses oleh pembina.'
        );
    }

    public function index()
    {
        $this->cekPembina();

        $tanggal = request('tanggal', now()->toDateString());

        $pendaftarans = Pendaftaran::with(['user', 'ekskul'])
            ->where('status', 'diterima')
            ->latest()
            ->get();

        $absensis = Absensi::whereDate('tanggal', $tanggal)
            ->get()
            ->keyBy('pendaftaran_id');

        return view('absensi.index', compact(
            'pendaftarans',
            'tanggal',
            'absensis'
        ));
    }

    public function store(Request $request)
    {
        $this->cekPembina();

        $validated = $request->validate([
            'tanggal' => 'required|date',
            'absensi' => 'required|array',
            'absensi.*.status' => 'required|in:hadir,izin,sakit,alpa',
            'absensi.*.catatan' => 'nullable|string|max:500',
        ]);

        foreach ($validated['absensi'] as $pendaftaranId => $data) {

            $pendaftaran = Pendaftaran::where('id', $pendaftaranId)
                ->where('status', 'diterima')
                ->firstOrFail();

            // Pengecekan duplikat sebelum menyimpan
            $duplikat = Absensi::where(
                'pendaftaran_id',
                $pendaftaran->id
            )
                ->whereDate('tanggal', $validated['tanggal'])
                ->exists();

            if ($duplikat) {
                return redirect()
                    ->route('absensi.index', [
                        'tanggal' => $validated['tanggal']
                    ])
                    ->with(
                        'error',
                        'Absensi siswa sudah tercatat pada tanggal tersebut.'
                    );
            }

            // Simpan jika belum ada data dengan kombinasi yang sama
            Absensi::create([
                'pendaftaran_id' => $pendaftaran->id,
                'pembina_id' => Auth::id(),
                'tanggal' => $validated['tanggal'],
                'status' => $data['status'],
                'catatan' => $data['catatan'] ?? null,
            ]);
        }

        return redirect()
            ->route('absensi.index', [
                'tanggal' => $validated['tanggal']
            ])
            ->with('success', 'Absensi berhasil disimpan.');
    }
}