<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pembina | EKSERA</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f3f7fc;
            color: #26384a;
        }

        .sidebar {
            width: 245px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #123f68;
            color: white;
            padding: 27px 18px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .brand {
            padding: 0 12px 30px;
            border-bottom: 1px solid rgba(255,255,255,.15);
        }

        .brand h2 {
            font-size: 25px;
            letter-spacing: 1px;
        }

        .brand p {
            font-size: 11px;
            color: #c4def2;
            margin-top: 6px;
            line-height: 1.5;
        }

        .menu-title {
            color: #a9c9e4;
            font-size: 11px;
            margin: 27px 12px 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 14px;
            color: #e8f3fc;
            text-decoration: none;
            border-radius: 9px;
            font-size: 14px;
            margin-bottom: 6px;
            transition: .2s;
        }

        .menu:hover,
        .menu.active {
            background: #2879b4;
            color: white;
        }

        .logout {
            margin-top: auto;
            padding: 13px;
            border: 1px solid rgba(255,255,255,.25);
            background: transparent;
            color: white;
            border-radius: 9px;
            cursor: pointer;
            font-size: 14px;
        }

        .logout:hover {
            background: #a93232;
        }

        .main {
            margin-left: 245px;
            padding: 30px 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
            gap: 15px;
        }

        .topbar h1 {
            font-size: 25px;
            color: #163f63;
        }

        .topbar p {
            color: #7b8b9b;
            font-size: 13px;
            margin-top: 7px;
        }

        .role {
            background: #e2f1fc;
            color: #17669c;
            padding: 9px 15px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: bold;
        }

        .welcome {
            background: linear-gradient(115deg, #14527f, #2786c4);
            color: white;
            padding: 28px 30px;
            border-radius: 15px;
            margin-bottom: 25px;
            box-shadow: 0 7px 20px rgba(20,82,127,.12);
        }

        .welcome h2 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .welcome p {
            font-size: 14px;
            line-height: 1.7;
            color: #e4f3ff;
            max-width: 650px;
        }

        .section-title {
            color: #193f60;
            font-size: 17px;
            margin: 28px 0 15px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 17px;
        }

        .stat-card {
            background: white;
            border-radius: 13px;
            padding: 21px;
            border: 1px solid #e8eef4;
            box-shadow: 0 3px 12px rgba(30,65,95,.04);
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            background: #e7f3fc;
            border-radius: 11px;
            font-size: 21px;
            margin-bottom: 15px;
        }

        .stat-card p {
            color: #8291a0;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .stat-card h3 {
            color: #174b75;
            font-size: 27px;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 18px;
            margin-top: 18px;
        }

        .panel {
            background: white;
            padding: 23px;
            border-radius: 13px;
            border: 1px solid #e8eef4;
            box-shadow: 0 3px 12px rgba(30,65,95,.04);
        }

        .panel h3 {
            font-size: 16px;
            color: #19496f;
            margin-bottom: 17px;
        }

        .action {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px;
            border: 1px solid #edf1f5;
            border-radius: 10px;
            text-decoration: none;
            color: #34495c;
            margin-bottom: 10px;
            transition: .2s;
        }

        .action:hover {
            background: #f1f8fd;
            border-color: #b8d9ef;
            transform: translateY(-2px);
        }

        .action-icon {
            width: 39px;
            height: 39px;
            display: grid;
            place-items: center;
            background: #e7f3fc;
            border-radius: 9px;
            font-size: 19px;
            flex-shrink: 0;
        }

        .action strong {
            display: block;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .action small {
            color: #8493a1;
            font-size: 11px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 18px;
        }

        .avatar {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            background: #dceefa;
            display: grid;
            place-items: center;
            color: #17618f;
            font-size: 25px;
            font-weight: bold;
        }

        .profile h4 {
            color: #244b6b;
            font-size: 15px;
            margin-bottom: 5px;
        }

        .profile p {
            color: #8493a1;
            font-size: 12px;
        }

        .profile-info {
            border-top: 1px solid #edf1f5;
            padding-top: 15px;
            font-size: 13px;
            color: #647789;
            line-height: 2;
            overflow-wrap: anywhere;
        }

        /* INFORMASI EVENT */
        .event-panel {
            background: white;
            padding: 23px;
            border-radius: 13px;
            border: 1px solid #e8eef4;
            box-shadow: 0 3px 12px rgba(30,65,95,.04);
            margin-top: 20px;
        }

        .event-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
        }

        .event-heading h3 {
            color: #19496f;
            font-size: 16px;
        }

        .event-count {
            background: #e7f3fc;
            color: #17669c;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .event-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .event-card {
            border: 1px solid #e8eef4;
            border-radius: 11px;
            padding: 17px;
            transition: .2s;
        }

        .event-card:hover {
            border-color: #b8d9ef;
            background: #fafdff;
        }

        .event-card h4 {
            color: #19496f;
            font-size: 15px;
            margin-bottom: 10px;
        }

        .event-meta {
            color: #718496;
            font-size: 12px;
            line-height: 1.9;
        }

        .event-description {
            color: #65798a;
            font-size: 12px;
            line-height: 1.6;
            margin-top: 10px;
        }

        .event-status {
            display: inline-block;
            margin-top: 12px;
            padding: 6px 10px;
            border-radius: 20px;
            background: #e7f3fc;
            color: #17669c;
            font-size: 10px;
            font-weight: bold;
        }

        .status-berlangsung {
            background: #e4f7ec;
            color: #21834b;
        }

        .status-selesai {
            background: #edf0f3;
            color: #65717d;
        }

        .empty-event {
            padding: 25px 15px;
            text-align: center;
            color: #8493a1;
            font-size: 13px;
            background: #f8fbfe;
            border-radius: 10px;
            border: 1px dashed #d6e3ed;
            grid-column: 1 / -1;
        }

        .footer {
            text-align: center;
            color: #98a6b3;
            font-size: 11px;
            margin-top: 30px;
            padding-bottom: 10px;
        }

        @media(max-width: 900px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width: 650px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 18px;
            }

            .brand {
                padding-bottom: 15px;
            }

            .menu-title {
                margin-top: 17px;
            }

            .logout {
                margin-top: 15px;
            }

            .main {
                margin-left: 0;
                padding: 22px 16px;
            }

            .topbar {
                align-items: flex-start;
            }

            .topbar h1 {
                font-size: 21px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .welcome {
                padding: 23px 20px;
            }

            .event-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

@php
    $jumlahEkskul = \App\Models\Ekskul::count();
    $jumlahPeserta = \App\Models\Pendaftaran::where('status', 'diterima')->count();
    $jumlahAbsensi = \App\Models\Absensi::count();
    $namaPembina = auth()->user()->name ?: 'Pak Ludi';
    $events = $events ?? collect();
@endphp

<aside class="sidebar">
    <div class="brand">
        <h2>EKSERA.</h2>
        <p>Sistem Informasi Ekstrakurikuler Seni dan Budaya</p>
    </div>

    <div class="menu-title">Menu Utama</div>

    <a href="{{ route('dashboard.pembina') }}" class="menu active">
        <span>⌂</span> Dashboard
    </a>

    <a href="{{ route('absensi.index') }}" class="menu">
        <span>▣</span> Absensi Peserta
    </a>

    <a href="{{ route('ekskul.index') }}" class="menu">
        <span>♫</span> Data Ekstrakurikuler
    </a>

    <a href="{{ url('/jadwal') }}" class="menu">
        <span>◷</span> Jadwal Latihan
    </a>

    <a href="{{ url('/event') }}" class="menu">
        <span>📅</span> Informasi Event
    </a>

    <div class="menu-title">Akun</div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout" style="width:100%">
            ↪ Keluar
        </button>
    </form>
</aside>

<main class="main">

    <div class="topbar">
        <div>
            <h1>Dashboard Pembina</h1>
            <p>Selamat datang di sistem informasi EKSERA.</p>
        </div>
        <span class="role">PEMBINA</span>
    </div>

    <section class="welcome">
        <h2>Halo, {{ $namaPembina }}! 👋</h2>
        <p>
            Selamat datang di Dashboard Pembina EKSERA.
            Kelola kegiatan ekstrakurikuler, pantau peserta,
            dan lakukan pencatatan kehadiran siswa dengan mudah.
        </p>
    </section>

    <h3 class="section-title">Ringkasan Data</h3>

    <section class="stats">
        <div class="stat-card">
            <div class="stat-icon">🎨</div>
            <p>Total Ekstrakurikuler</p>
            <h3>{{ $jumlahEkskul }}</h3>
        </div>

        <div class="stat-card">
            <div class="stat-icon">👥</div>
            <p>Peserta Diterima</p>
            <h3>{{ $jumlahPeserta }}</h3>
        </div>

        <div class="stat-card">
            <div class="stat-icon">📋</div>
            <p>Total Data Absensi</p>
            <h3>{{ $jumlahAbsensi }}</h3>
        </div>
    </section>

    <section class="content-grid">

        <div class="panel">
            <h3>Menu Pengelolaan</h3>

            <a href="{{ route('absensi.index') }}" class="action">
                <div class="action-icon">📋</div>
                <div>
                    <strong>Kelola Absensi Peserta</strong>
                    <small>Catat kehadiran, izin, sakit, dan alpa siswa.</small>
                </div>
            </a>

            <a href="{{ route('ekskul.index') }}" class="action">
                <div class="action-icon">🎭</div>
                <div>
                    <strong>Data Ekstrakurikuler</strong>
                    <small>Lihat informasi kegiatan seni dan budaya.</small>
                </div>
            </a>

            <a href="{{ url('/jadwal') }}" class="action">
                <div class="action-icon">🗓️</div>
                <div>
                    <strong>Jadwal Latihan</strong>
                    <small>Lihat jadwal kegiatan ekstrakurikuler.</small>
                </div>
            </a>

            <a href="{{ url('/event') }}" class="action">
                <div class="action-icon">🎉</div>
                <div>
                    <strong>Informasi Event</strong>
                    <small>Lihat informasi acara seni dan budaya EKSERA.</small>
                </div>
            </a>
        </div>

        <div class="panel">
            <h3>Identitas Pembina</h3>

            <div class="profile">
                <div class="avatar">👤</div>
                <div>
                    <h4>{{ $namaPembina }}</h4>
                    <p>Pembina EKSERA</p>
                </div>
            </div>

            <div class="profile-info">
                <div><strong>Nama:</strong> {{ $namaPembina }}</div>
                <div><strong>Email:</strong> {{ auth()->user()->email }}</div>
                <div><strong>Jabatan:</strong> Pembina</div>
            </div>
        </div>

    </section>

    <!-- INFORMASI EVENT -->
    <h3 class="section-title">Informasi Event EKSERA</h3>

    <section class="event-panel">
        <div class="event-heading">
            <h3>Daftar Kegiatan dan Acara</h3>
            <span class="event-count">{{ $events->count() }} Event</span>
        </div>

        <div class="event-list">
            @forelse($events as $event)
                <div class="event-card">
                    <h4>{{ $event->nama_event }}</h4>

                    <div class="event-meta">
                        <div>📅
                            {{ $event->tanggal
                                ? \Carbon\Carbon::parse($event->tanggal)->translatedFormat('d F Y')
                                : 'Tanggal belum ditentukan' }}
                        </div>

                        <div>🕒
                            {{ $event->jam_mulai
                                ? substr($event->jam_mulai, 0, 5)
                                : '--:--' }}
                            -
                            {{ $event->jam_selesai
                                ? substr($event->jam_selesai, 0, 5)
                                : '--:--' }}
                        </div>

                        <div>📍 {{ $event->lokasi ?: 'Lokasi belum ditentukan' }}</div>

                        @if($event->penyelenggara)
                            <div>👥 {{ $event->penyelenggara }}</div>
                        @endif
                    </div>

                    @if($event->deskripsi)
                        <p class="event-description">
                            {{ $event->deskripsi }}
                        </p>
                    @endif

                    <span class="event-status
                        {{ $event->status === 'berlangsung' ? 'status-berlangsung' : '' }}
                        {{ $event->status === 'selesai' ? 'status-selesai' : '' }}">
                        {{ ucfirst(str_replace('_', ' ', $event->status ?? 'akan_datang')) }}
                    </span>
                </div>
            @empty
                <div class="empty-event">
                    <div style="font-size:30px;margin-bottom:10px;">📅</div>
                    <strong>Belum ada informasi event.</strong>
                    <p style="margin-top:7px;">
                        Informasi event akan ditampilkan di sini setelah ditambahkan oleh Admin.
                    </p>
                </div>
            @endforelse
        </div>
    </section>

    <div class="footer">
        © {{ date('Y') }} EKSERA — Sistem Informasi Ekstrakurikuler Seni dan Budaya
    </div>

</main>

</body>
</html>