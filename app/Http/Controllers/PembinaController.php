<?php

namespace App\Http\Controllers;

use App\Models\Pembina;
use Illuminate\Http\Request;

class PembinaController extends Controller
{
    public function index()
    {
        $pembinas = Pembina::latest()->get();

        return view('pembina.index', compact('pembinas'));
    }

    public function create()
    {
        return view('pembina.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:pembinas,email',
            'no_hp' => 'required|string|max:20',
            'bidang' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        Pembina::create($validated);

        return redirect()
            ->route('pembina.index')
            ->with('success', 'Data pembina berhasil ditambahkan!');
    }

    public function edit(Pembina $pembina)
    {
        return view('pembina.edit', compact('pembina'));
    }

    public function update(Request $request, Pembina $pembina)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:pembinas,email,' . $pembina->id,
            'no_hp' => 'required|string|max:20',
            'bidang' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $pembina->update($validated);

        return redirect()
            ->route('pembina.index')
            ->with('success', 'Data pembina berhasil diperbarui!');
    }

    public function destroy(Pembina $pembina)
    {
        $pembina->delete();

        return redirect()
            ->route('pembina.index')
            ->with('success', 'Data pembina berhasil dihapus!');
    }
}