<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::latest()->get();

        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        return response()->view('siswa.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nis' => 'required|string|max:30',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|in:RPL,DKV,BRP',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        Siswa::create($data);

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $data = $request->validate([
            'nis' => 'required|string|max:30',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|in:RPL,DKV,BRP',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        $siswa->update($data);

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus!');
    }
}