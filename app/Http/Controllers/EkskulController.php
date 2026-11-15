<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkskulController extends Controller
{
    // Menampilkan semua data ekstrakurikuler
    public function index()
    {
        $ekskuls = Ekskul::latest()->get();

        return view('ekskul.index', compact('ekskuls'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('ekskul.create');
    }

    // Menyimpan data ekstrakurikuler
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_ekskul' => 'required|string|max:255',
            'pembina' => 'required|string|max:255',
            'hari' => 'required|string|max:50',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'manfaat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Upload foto
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')
                ->store('ekskul', 'public');
        }

        // Untuk kompatibilitas database lama
        $validated['kuota'] = 0;

        Ekskul::create($validated);

        return redirect()->route('ekskul.index')
            ->with('success', 'Data ekstrakurikuler berhasil ditambahkan!');
    }

    // Menampilkan detail ekstrakurikuler
    public function show(Ekskul $ekskul)
    {
        return view('ekskul.show', compact('ekskul'));
    }

    // Menampilkan form edit
    public function edit(Ekskul $ekskul)
    {
        return view('ekskul.edit', compact('ekskul'));
    }

    // Memperbarui data ekstrakurikuler
    public function update(Request $request, Ekskul $ekskul)
    {
        $validated = $request->validate([
            'nama_ekskul' => 'required|string|max:255',
            'pembina' => 'required|string|max:255',
            'hari' => 'required|string|max:50',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'manfaat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Jika mengganti foto
        if ($request->hasFile('foto')) {

            if ($ekskul->foto) {
                Storage::disk('public')->delete($ekskul->foto);
            }

            $validated['foto'] = $request->file('foto')
                ->store('ekskul', 'public');
        }

        // Kuota tidak digunakan
        $validated['kuota'] = 0;

        $ekskul->update($validated);

        return redirect()->route('ekskul.index')
            ->with('success', 'Data ekstrakurikuler berhasil diperbarui!');
    }

    // Menghapus data ekstrakurikuler
    public function destroy(Ekskul $ekskul)
    {
        // Hapus foto dari penyimpanan
        if ($ekskul->foto) {
            Storage::disk('public')->delete($ekskul->foto);
        }

        // Hapus data
        $ekskul->delete();

        return redirect()->route('ekskul.index')
            ->with('success', 'Data ekstrakurikuler berhasil dihapus!');
    }
}