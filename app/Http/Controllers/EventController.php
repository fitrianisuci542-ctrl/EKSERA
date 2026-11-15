<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    private function cekAdmin()
    {
        abort_unless(
            auth()->check() && auth()->user()->role === 'admin',
            403
        );
    }

    // Semua pengguna yang sudah login boleh melihat event
    public function index()
    {
        abort_unless(auth()->check(), 403);

        $events = Event::latest('id')->get();

        return view('event.index', compact('events'));
    }

    // Hanya admin yang boleh menambah event
    public function create()
    {
        $this->cekAdmin();

        return view('event.create');
    }

    public function store(Request $request)
    {
        $this->cekAdmin();

        $validated = $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'jam_mulai' => 'nullable',
            'jam_selesai' => 'nullable',
            'lokasi' => 'nullable|string|max:255',
            'penyelenggara' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')
                ->store('event', 'public');
        }

        Event::create($validated);

        return redirect()->route('event.index')
            ->with('success', 'Event berhasil ditambahkan!');
    }

    public function show(Event $event)
    {
        abort_unless(auth()->check(), 403);

        return view('event.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $this->cekAdmin();

        return view('event.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $this->cekAdmin();

        $validated = $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'jam_mulai' => 'nullable',
            'jam_selesai' => 'nullable',
            'lokasi' => 'nullable|string|max:255',
            'penyelenggara' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($event->foto) {
                Storage::disk('public')->delete($event->foto);
            }

            $validated['foto'] = $request->file('foto')
                ->store('event', 'public');
        }

        $event->update($validated);

        return redirect()->route('event.index')
            ->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy(Event $event)
    {
        $this->cekAdmin();

        if ($event->foto) {
            Storage::disk('public')->delete($event->foto);
        }

        $event->delete();

        return redirect()->route('event.index')
            ->with('success', 'Event berhasil dihapus!');
    }
}