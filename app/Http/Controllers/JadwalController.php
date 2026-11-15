<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Ekskul::orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        $jumlahJadwal = $jadwals->count();

        return view('jadwal.index', compact(
            'jadwals',
            'jumlahJadwal'
        ));
    }
}