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

    // Halaman untuk mengisi absensi
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

    // Menyimpan absensi
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

            Absensi::updateOrCreate(
                [
                    'pendaftaran_id' => $pendaftaran->id,
                    'tanggal' => $validated['tanggal'],
                ],
                [
                    'pembina_id' => Auth::id(),
                    'status' => $data['status'],
                    'catatan' => $data['catatan'] ?? null,
                ]
            );
        }

        return redirect()
            ->route('absensi.index', [
                'tanggal' => $validated['tanggal']
            ])
            ->with('success', 'Absensi berhasil disimpan.');
    }

    // Halaman riwayat absensi
    public function riwayat(Request $request)
    {
        $this->cekPembina();

        $query = Absensi::with([
            'pendaftaran.user',
            'pendaftaran.ekskul',
            'pembina'
        ]);

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $riwayat = $query
            ->latest('tanggal')
            ->latest('id')
            ->paginate(15)
            ->withQueryString();

        return view('absensi.riwayat', compact('riwayat'));
    }
}