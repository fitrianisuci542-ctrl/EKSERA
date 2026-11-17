<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Next Event - EKSERA</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }
        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 14px;
        }
        h1 { color: #0f4c81; }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 15px;
        }
        .btn {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 8px;
            background: #0f4c81;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
        .event {
            border: 1px solid #e2e8f0;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .event img {
            width: 100%;
            max-width: 350px;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 12px;
        }
        .alert {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .empty {
            text-align: center;
            padding: 40px;
            color: #64748b;
        }
        .actions {
            display: flex;
            gap: 8px;
            margin-top: 15px;
        }
        .edit { background: #e99b20; }
        .delete { background: #dc3545; }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <div>
            <h1>📅 Next Event EKSERA</h1>
            <p>Daftar kegiatan dan acara ekstrakurikuler.</p>
        </div>

        <a href="{{ route('event.create') }}" class="btn">
            + Tambah Event
        </a>
    </div>

    <a href="{{ route('dashboard.admin') }}">← Kembali ke Dashboard</a>

    <br><br>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    @forelse($events as $event)

        <div class="event">

            @if($event->foto)
                <img src="{{ Storage::disk('public')->url($event->foto) }}" alt="Foto Event">
            @endif

            <h2>{{ $event->nama_event }}</h2>

            <p>📅 Tanggal:
                {{ \Carbon\Carbon::parse($event->tanggal)->format('d-m-Y') }}
            </p>

            <p>🕒 Jam: {{ $event->jam_mulai }}
                @if($event->jam_selesai)
                    - {{ $event->jam_selesai }}
                @endif
            </p>

            <p>📍 Lokasi: {{ $event->lokasi }}</p>
            <p>👤 Penyelenggara: {{ $event->penyelenggara ?? '-' }}</p>

            <p style="margin-top:10px;">
                {{ $event->deskripsi }}
            </p>

            <p style="margin-top:10px;">
                Status: {{ str_replace('_', ' ', ucfirst($event->status)) }}
            </p>

            <div class="actions">

                <a href="{{ route('event.edit', $event->id) }}"
                   class="btn edit">Edit</a>

                <form action="{{ route('event.destroy', $event->id) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus event?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn delete">
                        Hapus
                    </button>
                </form>

            </div>

        </div>

    @empty

        <div class="empty">
            <h2>Belum Ada Event</h2>
            <p>Silakan klik tombol Tambah Event untuk membuat kegiatan baru.</p>
        </div>

    @endforelse

</div>

</body>
</html>