<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - EKSERA</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        html { scroll-behavior: smooth; }

        body {
            background: #f3f6fa;
            color: #263445;
        }

        .sidebar {
            width: 235px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #0f3d65;
            padding: 24px 16px;
            color: white;
            overflow-y: auto;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 8px 28px;
            border-bottom: 1px solid rgba(255,255,255,.15);
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: #70c5ef;
            color: #0f3d65;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            font-size: 20px;
            font-weight: bold;
        }

        .brand h2 { font-size: 20px; }

        .brand small {
            display: block;
            font-size: 10px;
            color: #c4d9eb;
        }

        .menu-title {
            font-size: 10px;
            color: #a9c6df;
            margin: 28px 10px 12px;
            letter-spacing: 1px;
        }

        .menu {
            display: block;
            padding: 12px;
            margin-bottom: 7px;
            color: #e5eff8;
            text-decoration: none;
            border-radius: 8px;
            font-size: 13px;
            transition: .2s;
        }

        .menu:hover,
        .menu.active {
            background: #1d5b8d;
            color: white;
        }

        .logout { margin-top: 30px; }

        .logout button {
            width: 100%;
            border: none;
            background: #d9534f;
            color: white;
            padding: 11px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
        }

        .main {
            margin-left: 235px;
            min-height: 100vh;
        }

        .navbar {
            min-height: 68px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,.04);
            gap: 12px;
        }

        .navbar h3 {
            font-size: 17px;
            color: #173f62;
        }

        .profile {
            font-size: 13px;
            color: #526477;
        }

        .content { padding: 28px 30px; }

        .welcome { margin-bottom: 24px; }

        .welcome h2 {
            color: #173f62;
            font-size: 23px;
            margin-bottom: 6px;
        }

        .welcome p {
            color: #8492a2;
            font-size: 13px;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            padding: 13px 16px;
            border-radius: 8px;
            border-left: 5px solid #10b981;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .section-heading {
            color: #173f62;
            font-size: 17px;
            margin: 28px 0 15px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 25px;
        }

        .attendance-cards {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 13px;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 19px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
        }

        .card-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 13px;
        }

        .blue { background: #e2f1ff; }
        .green { background: #dcfce7; }
        .orange { background: #fff0d9; }
        .purple { background: #eee5ff; }
        .red { background: #ffe2e2; }

        .card p {
            color: #8290a0;
            font-size: 12px;
            margin-bottom: 7px;
        }

        .card h2 {
            font-size: 25px;
            color: #183f61;
        }

        .attendance-cards .card { padding: 16px; }

        .attendance-cards .card h2 { font-size: 23px; }

        .section {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
            margin-bottom: 22px;
        }

        .section h3 {
            font-size: 16px;
            color: #173f62;
            margin-bottom: 16px;
        }

        .quick-menu {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 13px;
        }

        .quick-menu a {
            text-decoration: none;
            padding: 17px;
            border: 1px solid #e6edf3;
            border-radius: 10px;
            color: #234c70;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .quick-menu a:hover {
            background: #f0f7fc;
            border-color: #7bbce5;
        }

        .quick-menu span {
            display: block;
            font-size: 23px;
            margin-bottom: 10px;
        }

        .table-wrap { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th, td {
            padding: 13px 12px;
            text-align: left;
            border-bottom: 1px solid #edf1f5;
            font-size: 12px;
        }

        th {
            background: #edf5fb;
            color: #174c75;
            font-weight: 600;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .hadir, .selesai {
            background: #dcfce7;
            color: #16834b;
        }

        .izin, .akan-datang {
            background: #fff0c9;
            color: #9b6a00;
        }

        .sakit {
            background: #dcecff;
            color: #2366a5;
        }

        .alpa {
            background: #ffe0e0;
            color: #b52c2c;
        }

        .empty {
            text-align: center;
            color: #8492a2;
            padding: 25px;
        }

        .detail-link {
            display: inline-block;
            margin-top: 15px;
            color: #176da5;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .detail-link:hover { text-decoration: underline; }

        .event-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .event-item {
            border: 1px solid #e6edf3;
            border-radius: 10px;
            padding: 16px;
            background: #fff;
        }

        .event-item h4 {
            color: #14527f;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .event-detail {
            color: #718096;
            font-size: 12px;
            line-height: 1.8;
        }

        .event-description {
            color: #647589;
            font-size: 12px;
            line-height: 1.6;
            margin-top: 8px;
        }

        @media(max-width: 1100px) {
            .attendance-cards { grid-template-columns: repeat(3, 1fr); }
        }

        @media(max-width: 800px) {
            .sidebar { width: 190px; }
            .main { margin-left: 190px; }
            .cards, .quick-menu { grid-template-columns: repeat(2, 1fr); }
            .attendance-cards { grid-template-columns: repeat(2, 1fr); }
        }

        @media(max-width: 550px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main { margin-left: 0; }

            .navbar {
                padding: 15px;
                flex-direction: column;
                align-items: flex-start;
            }

            .content { padding: 20px 15px; }

            .cards, .quick-menu, .attendance-cards, .event-list {
                grid-template-columns: 1fr;
            }

            .logout { margin-top: 20px; }
        }
    </style>
</head>

<body>

@php
    $totalAbsensi = \App\Models\Absensi::count();
    $jumlahHadir = \App\Models\Absensi::where('status', 'hadir')->count();
    $jumlahIzin = \App\Models\Absensi::where('status', 'izin')->count();
    $jumlahSakit = \App\Models\Absensi::where('status', 'sakit')->count();
    $jumlahAlpa = \App\Models\Absensi::where('status', 'alpa')->count();

    $riwayatAbsensi = \App\Models\Absensi::with([
        'pendaftaran.user',
        'pendaftaran.ekskul'
    ])
    ->latest('tanggal')
    ->latest('id')
    ->take(10)
    ->get();

    $events = $events ?? collect();
@endphp

<aside class="sidebar">

    <div class="brand">
        <div class="brand-icon">E</div>
        <div>
            <h2>EKSERA</h2>
            <small>Sistem Ekstrakurikuler</small>
        </div>
    </div>

    <p class="menu-title">MENU UTAMA</p>

    <a href="{{ route('dashboard.admin') }}" class="menu active">🏠 Dashboard</a>
    <a href="{{ route('siswa.index') }}" class="menu">👨‍🎓 Data Siswa</a>
    <a href="{{ route('ekskul.index') }}" class="menu">🎨 Data Ekstrakurikuler</a>
    <a href="{{ route('pembina.index') }}" class="menu">👨‍🏫 Data Pembina</a>
    <a href="{{ route('admin.pendaftaran.index') }}" class="menu">📝 Data Pendaftaran</a>
    <a href="#rekap-absensi" class="menu">📋 Rekap Absensi</a>
    <a href="#informasi-event" class="menu">🎭 Informasi Event</a>
    <a href="{{ route('jadwal.index') }}" class="menu">📅 Jadwal Latihan</a>

    <p class="menu-title">AKUN</p>

    <div class="logout">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">↪ Logout</button>
        </form>
    </div>

</aside>

<main class="main">

    <nav class="navbar">
        <h3>Dashboard Admin</h3>
        <div class="profile">
            👤 {{ Auth::user()->name }} | Administrator
        </div>
    </nav>

    <div class="content">

        @if (session('success'))
            <div class="alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        <div class="welcome">
            <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p>Selamat datang di halaman administrasi EKSERA.</p>
        </div>

        <h3 class="section-heading">Ringkasan Sistem</h3>

        <div class="cards">
            <div class="card">
                <div class="card-icon blue">👨‍🎓</div>
                <p>Total Data Siswa</p>
                <h2>{{ \App\Models\Siswa::count() }}</h2>
            </div>

            <div class="card">
                <div class="card-icon green">🎨</div>
                <p>Total Ekstrakurikuler</p>
                <h2>{{ \App\Models\Ekskul::count() }}</h2>
            </div>

            <div class="card">
                <div class="card-icon orange">📝</div>
                <p>Total Pendaftaran</p>
                <h2>{{ \App\Models\Pendaftaran::count() }}</h2>
            </div>
        </div>

        <h3 class="section-heading" id="rekap-absensi">Rekap Kehadiran Siswa</h3>

        <div class="attendance-cards">
            <div class="card">
                <div class="card-icon blue">📋</div>
                <p>Total Absensi</p>
                <h2>{{ $totalAbsensi }}</h2>
            </div>

            <div class="card">
                <div class="card-icon green">✓</div>
                <p>Hadir</p>
                <h2>{{ $jumlahHadir }}</h2>
            </div>

            <div class="card">
                <div class="card-icon orange">📝</div>
                <p>Izin</p>
                <h2>{{ $jumlahIzin }}</h2>
            </div>

            <div class="card">
                <div class="card-icon blue">🤒</div>
                <p>Sakit</p>
                <h2>{{ $jumlahSakit }}</h2>
            </div>

            <div class="card">
                <div class="card-icon red">✕</div>
                <p>Alpa</p>
                <h2>{{ $jumlahAlpa }}</h2>
            </div>
        </div>

        <div class="section">
            <h3>Riwayat Absensi Terbaru</h3>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Ekstrakurikuler</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($riwayatAbsensi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->pendaftaran->user->name ?? '-' }}</td>
                                <td>{{ $item->pendaftaran->ekskul->nama_ekskul ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>
                                    <span class="status {{ $item->status }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td>{{ $item->catatan ?: '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty">
                                    Belum ada data absensi yang tersimpan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <h3 class="section-heading" id="informasi-event">Informasi Event EKSERA</h3>

        <div class="section">
            <h3>Event Terbaru</h3>

            <div class="cards">
                <div class="card">
                    <div class="card-icon purple">🎭</div>
                    <p>Total Event</p>
                    <h2>{{ $events->count() }}</h2>
                </div>
            </div>

            <div class="event-list">
                @forelse($events as $event)
                    <article class="event-item">
                        <h4>🎭 {{ $event->nama_event }}</h4>

                        <div class="event-detail">
                            📅
                            {{ $event->tanggal
                                ? \Carbon\Carbon::parse($event->tanggal)->format('d-m-Y')
                                : 'Tanggal belum ditentukan' }}
                            <br>

                            🕒
                            {{ $event->jam_mulai
                                ? \Carbon\Carbon::parse($event->jam_mulai)->format('H:i')
                                : '-' }}
                            -
                            {{ $event->jam_selesai
                                ? \Carbon\Carbon::parse($event->jam_selesai)->format('H:i')
                                : '-' }}
                            <br>

                            📍 {{ $event->lokasi ?: 'Lokasi belum ditentukan' }}
                            <br>

                            Status: {{ $event->status ?: 'Belum ditentukan' }}
                        </div>

                        <p class="event-description">
                            {{ $event->deskripsi ?: 'Tidak ada deskripsi event.' }}
                        </p>
                    </article>
                @empty
                    <div class="empty" style="grid-column: 1 / -1;">
                        🎭 Belum ada informasi event yang tersedia.
                    </div>
                @endforelse
            </div>

            <a href="{{ url('/event') }}" class="detail-link">
                Kelola Informasi Event →
            </a>
        </div>

        <div class="section">
            <h3>Menu Pengelolaan Sistem</h3>

            <div class="quick-menu">
                <a href="{{ route('siswa.index') }}">
                    <span>👨‍🎓</span>Kelola Data Siswa
                </a>

                <a href="{{ route('ekskul.index') }}">
                    <span>🎨</span>Kelola Ekstrakurikuler
                </a>

                <a href="{{ route('pembina.index') }}">
                    <span>👨‍🏫</span>Kelola Data Pembina
                </a>

                <a href="{{ route('admin.pendaftaran.index') }}">
                    <span>📝</span>Kelola Pendaftaran
                </a>

                <a href="{{ route('jadwal.index') }}">
                    <span>📅</span>Jadwal Latihan
                </a>

                <a href="{{ url('/event') }}">
                    <span>🎭</span>Kelola Informasi Event
                </a>
            </div>
        </div>

    </div>
</main>

</body>
</html>