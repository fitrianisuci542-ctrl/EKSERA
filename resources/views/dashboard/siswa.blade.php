<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa | EKSERA</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f1f6fb;
            color: #24364b;
        }

        .sidebar {
            width: 245px;
            height: 100vh;
            background: #123f68;
            position: fixed;
            top: 0;
            left: 0;
            padding: 25px 17px;
            color: white;
            overflow-y: auto;
        }

        .brand {
            font-size: 23px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 5px;
        }

        .brand span {
            color: #8fd3ff;
        }

        .brand-desc {
            font-size: 10px;
            text-align: center;
            color: #c5e5ff;
            line-height: 1.5;
            margin-bottom: 35px;
        }

        .menu-title {
            font-size: 11px;
            color: #9fc8e8;
            margin: 20px 10px 10px;
            text-transform: uppercase;
        }

        .menu a {
            display: block;
            text-decoration: none;
            color: #e8f4ff;
            padding: 12px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 7px;
            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: #2786c4;
            color: white;
        }

        .logout-form {
            margin-top: 30px;
        }

        .logout-btn {
            width: 100%;
            border: none;
            background: #dceaf6;
            color: #123f68;
            padding: 11px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
        }

        .logout-btn:hover {
            background: white;
        }

        .main {
            margin-left: 245px;
            padding: 25px 30px;
        }

        .navbar {
            background: white;
            padding: 13px 20px;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
            margin-bottom: 23px;
        }

        .navbar h2 {
            color: #14527f;
            font-size: 18px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            color: #34536e;
        }

        .user-photo,
        .user-placeholder {
            width: 36px;
            height: 36px;
            border-radius: 50%;
        }

        .user-photo {
            object-fit: cover;
        }

        .user-placeholder {
            background: #e0f1ff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .welcome {
            background: linear-gradient(120deg, #14527f, #2786c4);
            color: white;
            padding: 24px 27px;
            border-radius: 13px;
            margin-bottom: 23px;
        }

        .welcome h1 {
            font-size: 21px;
            margin-bottom: 9px;
        }

        .welcome p {
            font-size: 13px;
            color: #e3f3ff;
            line-height: 1.7;
        }

        .section-title {
            color: #173d61;
            font-size: 17px;
            margin-bottom: 14px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 17px;
            display: flex;
            align-items: center;
            gap: 13px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background: #e5f3ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            flex-shrink: 0;
        }

        .stat-card h3 {
            font-size: 21px;
            color: #14527f;
            margin-bottom: 4px;
        }

        .stat-card p {
            color: #8291a2;
            font-size: 11px;
        }

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 27px;
        }

        .quick-card {
            display: block;
            background: white;
            padding: 18px;
            border-radius: 12px;
            text-decoration: none;
            color: #24364b;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
            transition: .2s;
            border: 1px solid transparent;
        }

        .quick-card:hover {
            transform: translateY(-3px);
            border-color: #b9ddf7;
            box-shadow: 0 6px 16px rgba(0,0,0,.07);
        }

        .quick-icon {
            width: 41px;
            height: 41px;
            border-radius: 10px;
            background: #e5f3ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 12px;
        }

        .quick-card h3 {
            color: #14527f;
            font-size: 14px;
            margin-bottom: 7px;
        }

        .quick-card p {
            color: #8291a2;
            font-size: 11px;
            line-height: 1.6;
        }

        .event-section {
            margin-top: 5px;
            margin-bottom: 25px;
        }

        .event-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
        }

        .event-card {
            background: white;
            padding: 18px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
            border-left: 4px solid #2786c4;
        }

        .event-card h3 {
            color: #14527f;
            font-size: 15px;
            margin-bottom: 10px;
        }

        .event-info {
            color: #657b90;
            font-size: 12px;
            line-height: 1.8;
            margin-bottom: 8px;
        }

        .event-description {
            color: #718399;
            font-size: 12px;
            line-height: 1.6;
            margin-top: 8px;
        }

        .event-status {
            display: inline-block;
            background: #e5f3ff;
            color: #14527f;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
            margin-top: 9px;
        }

        .empty-event {
            background: white;
            padding: 25px;
            text-align: center;
            color: #8291a2;
            font-size: 13px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
        }

        .footer {
            text-align: center;
            color: #94a3b3;
            font-size: 11px;
            margin-top: 30px;
            padding-bottom: 10px;
        }

        @media(max-width: 950px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .quick-grid,
            .event-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 600px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .brand-desc {
                margin-bottom: 15px;
            }

            .main {
                margin-left: 0;
                padding: 17px;
            }

            .stats,
            .quick-grid,
            .event-grid {
                grid-template-columns: 1fr;
            }

            .welcome h1 {
                font-size: 19px;
            }

            .navbar {
                gap: 10px;
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>

@php
    $user = auth()->user();

    $totalEkskul = \App\Models\Ekskul::count();

    $totalPendaftaran = \App\Models\Pendaftaran::where(
        'user_id',
        $user->id
    )->count();

    $pendaftaranMenunggu = \App\Models\Pendaftaran::where(
        'user_id',
        $user->id
    )->where('status', 'menunggu')->count();

    $events = $events ?? collect();
@endphp

<aside class="sidebar">

    <div class="brand">EKSE<span>RA</span></div>

    <div class="brand-desc">
        Sistem Informasi Ekstrakurikuler Seni dan Budaya
    </div>

    <div class="menu-title">Menu Utama</div>

    <nav class="menu">
        <a href="{{ route('dashboard.siswa') }}" class="active">
            🏠 Dashboard
        </a>

        <a href="{{ route('pendaftaran.index') }}">
            🎨 Daftar Ekstrakurikuler
        </a>

        <a href="{{ route('pendaftaran.saya') }}">
            📝 Pendaftaran Saya
        </a>

        <a href="{{ route('jadwal.index') }}">
            📅 Jadwal Latihan
        </a>

        <a href="{{ route('event.index') }}">
            🎭 Informasi Event
        </a>

        <a href="{{ route('profil.siswa') }}">
            👤 Profil Saya
        </a>
    </nav>

    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="logout-btn">
            Keluar ↗
        </button>
    </form>

</aside>

<main class="main">

    <div class="navbar">
        <h2>Dashboard Siswa</h2>

        <div class="user-info">
            @if($user->foto_profil)
                <img
                    src="{{ asset('storage/' . $user->foto_profil) }}"
                    class="user-photo"
                    alt="Foto profil">
            @else
                <div class="user-placeholder">👤</div>
            @endif

            <span>{{ $user->name }} | Siswa</span>
        </div>
    </div>

    <section class="welcome">
        <h1>Selamat Datang, {{ $user->name }}! 👋</h1>

        <p>
            Selamat datang di EKSERA. Kembangkan minat dan bakatmu
            melalui kegiatan Seni Tari, Pencak Silat, dan Karawitan.
            Temukan kegiatan yang kamu sukai dan ikuti berbagai
            aktivitas seni dan budaya di sekolah!
        </p>
    </section>

    <h3 class="section-title">Ringkasan Aktivitas</h3>

    <section class="stats">

        <div class="stat-card">
            <div class="stat-icon">🎨</div>
            <div>
                <h3>{{ $totalEkskul }}</h3>
                <p>Total Ekstrakurikuler</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">📝</div>
            <div>
                <h3>{{ $totalPendaftaran }}</h3>
                <p>Pendaftaran Saya</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">⏳</div>
            <div>
                <h3>{{ $pendaftaranMenunggu }}</h3>
                <p>Menunggu Konfirmasi</p>
            </div>
        </div>

    </section>

    <h3 class="section-title">Menu Cepat</h3>

    <section class="quick-grid">

        <a href="{{ route('pendaftaran.index') }}" class="quick-card">
            <div class="quick-icon">🎨</div>
            <h3>Daftar Ekstrakurikuler</h3>
            <p>Lihat pilihan kegiatan seni dan budaya EKSERA.</p>
        </a>

        <a href="{{ route('pendaftaran.saya') }}" class="quick-card">
            <div class="quick-icon">📝</div>
            <h3>Pendaftaran Saya</h3>
            <p>Lihat daftar dan status pendaftaran ekstrakurikuler.</p>
        </a>

        <a href="{{ route('jadwal.index') }}" class="quick-card">
            <div class="quick-icon">📅</div>
            <h3>Jadwal Latihan</h3>
            <p>Lihat hari, waktu, dan lokasi latihan kegiatan.</p>
        </a>

        <a href="{{ route('event.index') }}" class="quick-card">
            <div class="quick-icon">🎭</div>
            <h3>Informasi Event</h3>
            <p>Lihat informasi acara dan kegiatan seni budaya EKSERA.</p>
        </a>

        <a href="{{ route('profil.siswa') }}" class="quick-card">
            <div class="quick-icon">👤</div>
            <h3>Profil Saya</h3>
            <p>Perbarui nama, email, dan foto profil akunmu.</p>
        </a>

    </section>

    <section class="event-section">

        <h3 class="section-title">Informasi Event EKSERA 🎭</h3>

        @if($events->count() > 0)

            <div class="event-grid">

                @foreach($events as $event)

                    <div class="event-card">

                        <h3>{{ $event->nama_event }}</h3>

                        <div class="event-info">
                            📅 {{ $event->tanggal ? \Carbon\Carbon::parse($event->tanggal)->translatedFormat('d F Y') : '-' }}
                            <br>

                            🕒 {{ $event->jam_mulai ? substr($event->jam_mulai, 0, 5) : '-' }}
                            @if($event->jam_selesai)
                                - {{ substr($event->jam_selesai, 0, 5) }}
                            @endif

                            <br>

                            📍 {{ $event->lokasi ?? '-' }}

                            @if($event->penyelenggara)
                                <br>
                                👥 Penyelenggara: {{ $event->penyelenggara }}
                            @endif
                        </div>

                        @if($event->deskripsi)
                            <p class="event-description">
                                {{ $event->deskripsi }}
                            </p>
                        @endif

                        <span class="event-status">
                            @if($event->status === 'akan_datang')
                                Akan Datang
                            @elseif($event->status === 'berlangsung')
                                Sedang Berlangsung
                            @elseif($event->status === 'selesai')
                                Selesai
                            @else
                                {{ ucfirst($event->status ?? 'Informasi') }}
                            @endif
                        </span>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty-event">
                Belum ada informasi event EKSERA saat ini.
            </div>

        @endif

    </section>

    <div class="footer">
        © {{ date('Y') }} EKSERA - Sistem Informasi Ekstrakurikuler Seni dan Budaya
    </div>

</main>

</body>
</html>