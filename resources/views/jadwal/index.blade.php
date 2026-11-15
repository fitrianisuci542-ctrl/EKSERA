<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Latihan | EKSERA</title>

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
            margin-top: 25px;
        }

        .logout-btn {
            width: 100%;
            border: none;
            background: #ffffff18;
            color: white;
            padding: 12px;
            border-radius: 8px;
            text-align: left;
            cursor: pointer;
            font-size: 13px;
        }

        .logout-btn:hover {
            background: #ffffff30;
        }

        .main {
            margin-left: 245px;
            padding: 25px 30px;
        }

        .navbar {
            background: white;
            padding: 14px 20px;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
            margin-bottom: 25px;
        }

        .navbar h2 {
            color: #14527f;
            font-size: 18px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 13px;
            color: #34536e;
        }

        .user-photo,
        .user-placeholder {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-placeholder {
            background: #e0f1ff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .page-title {
            font-size: 23px;
            color: #123b5d;
            margin-bottom: 6px;
        }

        .subtitle {
            color: #718096;
            font-size: 13px;
            margin-bottom: 22px;
        }

        .header-card {
            background: linear-gradient(120deg, #14527f, #2786c4);
            padding: 23px 25px;
            border-radius: 13px;
            color: white;
            margin-bottom: 20px;
        }

        .header-card h3 {
            font-size: 19px;
            margin-bottom: 8px;
        }

        .header-card p {
            font-size: 12px;
            line-height: 1.7;
            color: #e3f3ff;
        }

        .summary {
            background: white;
            padding: 17px 20px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
            margin-bottom: 22px;
        }

        .summary-icon {
            width: 45px;
            height: 45px;
            background: #e5f3ff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .summary h3 {
            color: #14527f;
            font-size: 21px;
            margin-bottom: 3px;
        }

        .summary p {
            color: #8291a2;
            font-size: 12px;
        }

        .section-heading {
            color: #173d61;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .schedule-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 17px;
        }

        .schedule-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
            transition: .2s;
        }

        .schedule-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 18px rgba(0,0,0,.08);
        }

        .photo-wrapper {
            height: 165px;
            background: #e5f1fb;
            overflow: hidden;
        }

        .ekskul-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .photo-placeholder {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 43px;
            color: #2786c4;
        }

        .card-content {
            padding: 17px;
        }

        .card-content h3 {
            font-size: 16px;
            color: #14527f;
            margin-bottom: 12px;
        }

        .day-badge {
            display: inline-block;
            background: #e5f3ff;
            color: #17649b;
            padding: 6px 11px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 13px;
        }

        .detail {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            color: #647589;
            font-size: 12px;
            margin-top: 9px;
        }

        .detail-icon {
            width: 17px;
            flex-shrink: 0;
        }

        .empty {
            grid-column: 1 / -1;
            background: white;
            border-radius: 12px;
            padding: 40px 15px;
            text-align: center;
            color: #8291a2;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
        }

        .empty-icon {
            font-size: 38px;
            margin-bottom: 10px;
        }

        .empty strong {
            display: block;
            color: #14527f;
            margin-bottom: 7px;
            font-size: 15px;
        }

        .empty p {
            font-size: 12px;
        }

        @media(max-width: 850px) {
            .schedule-grid {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width: 550px) {
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
                padding: 18px;
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
    $role = $user->role ?? 'siswa';
@endphp

<aside class="sidebar">
    <div class="brand">EKSE<span>RA</span></div>

    <div class="brand-desc">
        Sistem Informasi Ekstrakurikuler Seni dan Budaya
    </div>

    <div class="menu-title">Menu Utama</div>

    <nav class="menu">

        @if($role === 'admin')

            <a href="{{ route('dashboard.admin') }}">🏠 Dashboard Admin</a>
            <a href="{{ route('siswa.index') }}">👥 Data Siswa</a>
            <a href="{{ route('ekskul.index') }}">🎨 Data Ekstrakurikuler</a>
            <a href="{{ route('pembina.index') }}">👨‍🏫 Data Pembina</a>
            <a href="{{ route('admin.pendaftaran.index') }}">📝 Data Pendaftaran</a>
            <a href="{{ route('jadwal.index') }}" class="active">📅 Jadwal Latihan</a>
            <a href="{{ url('/event') }}">🎭 Informasi Event</a>

        @elseif($role === 'pembina')

            <a href="{{ route('dashboard.pembina') }}">🏠 Dashboard Pembina</a>
            <a href="{{ route('absensi.index') }}">📋 Absensi Peserta</a>
            <a href="{{ route('ekskul.index') }}">🎨 Data Ekstrakurikuler</a>
            <a href="{{ route('jadwal.index') }}" class="active">📅 Jadwal Latihan</a>
            <a href="{{ url('/event') }}">🎭 Informasi Event</a>

        @else

            <a href="{{ route('dashboard.siswa') }}">🏠 Dashboard</a>
            <a href="{{ route('pendaftaran.index') }}">🎨 Daftar Ekstrakurikuler</a>
            <a href="{{ route('pendaftaran.saya') }}">📝 Pendaftaran Saya</a>
            <a href="{{ route('jadwal.index') }}" class="active">📅 Jadwal Latihan</a>
            <a href="{{ url('/event') }}">🎭 Informasi Event</a>

        @endif

    </nav>

    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="logout-btn">🚪 Keluar</button>
    </form>
</aside>

<main class="main">

    <div class="navbar">
        <h2>Jadwal Latihan</h2>

        <div class="user-info">
            @if($user && $user->foto_profil)
                <img
                    src="{{ asset('storage/' . $user->foto_profil) }}"
                    class="user-photo"
                    alt="Foto profil">
            @else
                <div class="user-placeholder">👤</div>
            @endif

            <span>
                {{ $user->name ?? 'Pengguna' }}
                | {{ ucfirst($role) }}
            </span>
        </div>
    </div>

    <h1 class="page-title">Jadwal Latihan 📅</h1>

    <p class="subtitle">
        Lihat informasi waktu dan lokasi latihan ekstrakurikuler EKSERA.
    </p>

    <section class="header-card">
        <h3>Jadwal Latihan EKSERA</h3>
        <p>
            Temukan jadwal kegiatan Seni Tari, Pencak Silat, dan Karawitan.
            Pastikan kamu mengetahui hari, waktu, serta lokasi latihan
            agar tidak melewatkan kegiatan.
        </p>
    </section>

    <section class="summary">
        <div class="summary-icon">🗓️</div>
        <div>
            <h3>{{ $jumlahJadwal }}</h3>
            <p>Total Jadwal Ekstrakurikuler</p>
        </div>
    </section>

    <h3 class="section-heading">Daftar Jadwal Latihan</h3>

    <div class="schedule-grid">

        @forelse($jadwals as $jadwal)

            <article class="schedule-card">

                <div class="photo-wrapper">
                    @if($jadwal->foto)
                        <img
                            src="{{ asset('storage/' . $jadwal->foto) }}"
                            alt="{{ $jadwal->nama_ekskul }}"
                            class="ekskul-photo">
                    @else
                        <div class="photo-placeholder">🎨</div>
                    @endif
                </div>

                <div class="card-content">

                    <h3>{{ $jadwal->nama_ekskul }}</h3>

                    <span class="day-badge">
                        📅 {{ $jadwal->hari ?: 'Hari belum ditentukan' }}
                    </span>

                    <div class="detail">
                        <span class="detail-icon">🕒</span>
                        <span>
                            {{ $jadwal->jam_mulai
                                ? \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i')
                                : '-' }}
                            -
                            {{ $jadwal->jam_selesai
                                ? \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i')
                                : '-' }}
                        </span>
                    </div>

                    <div class="detail">
                        <span class="detail-icon">📍</span>
                        <span>{{ $jadwal->lokasi ?: 'Lokasi belum ditentukan' }}</span>
                    </div>

                    <div class="detail">
                        <span class="detail-icon">👨‍🏫</span>
                        <span>{{ $jadwal->pembina ?: 'Pembina belum ditentukan' }}</span>
                    </div>

                </div>
            </article>

        @empty

            <div class="empty">
                <div class="empty-icon">📅</div>
                <strong>Belum Ada Jadwal Latihan</strong>
                <p>
                    Jadwal latihan belum tersedia. Silakan cek kembali nanti.
                </p>
            </div>

        @endforelse

    </div>

</main>

</body>
</html>