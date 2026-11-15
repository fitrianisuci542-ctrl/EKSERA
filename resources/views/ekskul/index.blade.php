<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ekstrakurikuler | EKSERA</title>

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
            width: 235px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #123f68;
            color: white;
            padding: 23px 16px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .brand {
            padding: 0 12px 23px;
            border-bottom: 1px solid rgba(255,255,255,.15);
        }

        .brand h2 {
            font-size: 24px;
            letter-spacing: 1px;
        }

        .brand p {
            font-size: 10px;
            color: #c4def2;
            margin-top: 6px;
            line-height: 1.5;
        }

        .menu-title {
            color: #a9c9e4;
            font-size: 10px;
            margin: 23px 12px 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 11px 13px;
            color: #e8f3fc;
            text-decoration: none;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 5px;
            transition: .2s;
        }

        .menu:hover,
        .menu.active {
            background: #2879b4;
            color: white;
        }

        .logout {
            margin-top: auto;
            padding: 11px;
            border: 1px solid rgba(255,255,255,.25);
            background: transparent;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            width: 100%;
        }

        .logout:hover {
            background: #a93232;
        }

        .main {
            margin-left: 235px;
            padding: 27px 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 22px;
        }

        .topbar h1 {
            font-size: 23px;
            color: #163f63;
        }

        .topbar p {
            color: #7b8b9b;
            font-size: 12px;
            margin-top: 6px;
        }

        .role {
            background: #e2f1fc;
            color: #17669c;
            padding: 8px 13px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .welcome {
            background: linear-gradient(115deg, #14527f, #2786c4);
            color: white;
            padding: 20px 23px;
            border-radius: 12px;
            margin-bottom: 23px;
            box-shadow: 0 5px 15px rgba(20,82,127,.10);
        }

        .welcome h2 {
            font-size: 18px;
            margin-bottom: 7px;
        }

        .welcome p {
            font-size: 12px;
            line-height: 1.7;
            color: #e4f3ff;
        }

        .alert {
            background: #dcfce7;
            color: #166534;
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 17px;
            font-size: 12px;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .section-heading h3 {
            color: #193f60;
            font-size: 16px;
        }

        .section-heading p {
            color: #8795a3;
            font-size: 11px;
            margin-top: 5px;
        }

        .btn {
            display: inline-block;
            padding: 9px 12px;
            border: none;
            border-radius: 7px;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 11px;
            white-space: nowrap;
        }

        .btn-edit {
            background: #e99b22;
        }

        .btn-hapus {
            background: #dc4545;
        }

        .btn-tambah {
            background: #2879b9;
        }

        .btn:hover {
            opacity: .85;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            align-items: stretch;
        }

        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e8eef4;
            box-shadow: 0 3px 12px rgba(30,65,95,.04);
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .card img,
        .no-photo {
            width: 100%;
            height: 155px;
            object-fit: cover;
            display: block;
        }

        .no-photo {
            display: grid;
            place-items: center;
            background: #eaf3fa;
            color: #6c91ad;
            font-size: 38px;
        }

        .card-content {
            padding: 14px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .card h3 {
            color: #174b75;
            font-size: 16px;
            margin-bottom: 12px;
            overflow-wrap: anywhere;
        }

        .info-list {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            font-size: 11px;
            color: #617487;
            line-height: 1.5;
            min-width: 0;
        }

        .info-icon {
            width: 25px;
            height: 25px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            background: #edf6fd;
            color: #2879b4;
            border-radius: 7px;
            font-size: 12px;
        }

        .info-text {
            min-width: 0;
            overflow-wrap: anywhere;
        }

        .info-text strong {
            display: block;
            color: #34536d;
            font-size: 10px;
            margin-bottom: 2px;
        }

        .jadwal {
            background: #f0f7fd;
            border: 1px solid #dfedf8;
            border-radius: 8px;
            padding: 10px;
            margin-top: 11px;
        }

        .jadwal-label {
            color: #6d879d;
            font-size: 10px;
            margin-bottom: 5px;
        }

        .jadwal-value {
            color: #14527f;
            font-size: 13px;
            font-weight: bold;
        }

        .deskripsi {
            margin-top: 12px;
            padding-top: 11px;
            border-top: 1px solid #edf1f5;
            color: #718294;
            font-size: 11px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .deskripsi strong {
            display: block;
            color: #34536d;
            font-size: 10px;
            margin-bottom: 4px;
        }

        .aksi {
            display: flex;
            gap: 7px;
            flex-wrap: wrap;
            margin-top: auto;
            padding-top: 13px;
        }

        .aksi form {
            margin: 0;
        }

        .kosong {
            background: white;
            padding: 35px 20px;
            border-radius: 12px;
            text-align: center;
            border: 1px solid #e8eef4;
            color: #8291a0;
        }

        .kosong .icon {
            font-size: 35px;
            margin-bottom: 10px;
        }

        .kosong h3 {
            font-size: 16px;
            margin-bottom: 7px;
            color: #174b75;
        }

        .kosong p {
            font-size: 12px;
        }

        .footer {
            text-align: center;
            color: #98a6b3;
            font-size: 10px;
            margin-top: 28px;
            padding-bottom: 10px;
        }

        @media(max-width: 1100px) {
            .grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media(max-width: 750px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main {
                margin-left: 0;
                padding: 22px 16px;
            }

            .grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media(max-width: 520px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .topbar {
                align-items: flex-start;
            }

            .topbar h1 {
                font-size: 20px;
            }

            .section-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .welcome {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

@php
    $role = auth()->user()->role;
@endphp

<aside class="sidebar">

    <div class="brand">
        <h2>EKSERA.</h2>
        <p>Sistem Informasi Ekstrakurikuler Seni dan Budaya</p>
    </div>

    <div class="menu-title">Menu Utama</div>

    @if($role === 'admin')

        <a href="{{ route('dashboard.admin') }}" class="menu">
            <span>⌂</span> Dashboard
        </a>

        <a href="{{ route('siswa.index') }}" class="menu">
            <span>👥</span> Data Siswa
        </a>

        <a href="{{ route('ekskul.index') }}" class="menu active">
            <span>♫</span> Data Ekstrakurikuler
        </a>

        <a href="{{ route('pembina.index') }}" class="menu">
            <span>👤</span> Data Pembina
        </a>

        <a href="{{ route('admin.pendaftaran.index') }}" class="menu">
            <span>📝</span> Pendaftaran
        </a>

        <a href="{{ url('/event') }}" class="menu">
            <span>🎉</span> Event
        </a>

    @elseif($role === 'pembina')

        <a href="{{ route('dashboard.pembina') }}" class="menu">
            <span>⌂</span> Dashboard
        </a>

        <a href="{{ route('absensi.index') }}" class="menu">
            <span>▣</span> Absensi Peserta
        </a>

        <a href="{{ route('ekskul.index') }}" class="menu active">
            <span>♫</span> Data Ekstrakurikuler
        </a>

        <a href="{{ url('/jadwal') }}" class="menu">
            <span>◷</span> Jadwal Latihan
        </a>

    @else

        <a href="{{ route('dashboard.siswa') }}" class="menu">
            <span>⌂</span> Dashboard
        </a>

        <a href="{{ route('pendaftaran.index') }}" class="menu">
            <span>📝</span> Pendaftaran Ekskul
        </a>

        <a href="{{ route('pendaftaran.saya') }}" class="menu">
            <span>📋</span> Pendaftaran Saya
        </a>

    @endif

    <div class="menu-title">Akun</div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout">↪ Keluar</button>
    </form>

</aside>

<main class="main">

    <div class="topbar">
        <div>
            <h1>Data Ekstrakurikuler</h1>
            <p>Informasi kegiatan seni dan budaya EKSERA.</p>
        </div>

        <span class="role">{{ strtoupper($role) }}</span>
    </div>

    <section class="welcome">
        <h2>Informasi Ekstrakurikuler 🎨</h2>
        <p>
            Temukan informasi kegiatan Seni Tari, Pencak Silat,
            dan Karawitan beserta jadwal serta lokasi latihannya.
        </p>
    </section>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="section-heading">
        <div>
            <h3>Daftar Kegiatan Ekstrakurikuler</h3>
            <p>Informasi lengkap kegiatan ekstrakurikuler sekolah.</p>
        </div>

        @if($role === 'admin')
            <a href="{{ route('ekskul.create') }}" class="btn btn-tambah">
                + Tambah Ekskul
            </a>
        @endif
    </div>

    @if($ekskuls->count() > 0)

        <div class="grid">

            @foreach($ekskuls as $item)

                <article class="card">

                    @if($item->foto)
                        <img
                            src="{{ asset('storage/'.$item->foto) }}"
                            alt="Foto {{ $item->nama_ekskul }}"
                        >
                    @else
                        <div class="no-photo">🎭</div>
                    @endif

                    <div class="card-content">

                        <h3>{{ $item->nama_ekskul }}</h3>

                        <div class="info-list">

                            <div class="info-item">
                                <span class="info-icon">👤</span>
                                <div class="info-text">
                                    <strong>Pembina</strong>
                                    {{ $item->pembina ?: 'Belum ditentukan' }}
                                </div>
                            </div>

                            <div class="info-item">
                                <span class="info-icon">📅</span>
                                <div class="info-text">
                                    <strong>Hari Latihan</strong>
                                    {{ $item->hari ?: 'Belum ditentukan' }}
                                </div>
                            </div>

                            <div class="info-item">
                                <span class="info-icon">📍</span>
                                <div class="info-text">
                                    <strong>Lokasi Latihan</strong>
                                    {{ $item->lokasi ?: 'Belum ditentukan' }}
                                </div>
                            </div>

                        </div>

                        <div class="jadwal">
                            <div class="jadwal-label">Waktu Latihan</div>
                            <div class="jadwal-value">
                                {{ $item->jam_mulai ? \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') : '--:--' }}
                                –
                                {{ $item->jam_selesai ? \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') : '--:--' }}
                            </div>
                        </div>

                        @if($item->deskripsi)
                            <div class="deskripsi">
                                <strong>Deskripsi Kegiatan</strong>
                                {{ $item->deskripsi }}
                            </div>
                        @endif

                        @if($role === 'admin')
                            <div class="aksi">

                                <a
                                    href="{{ route('ekskul.edit', $item->id) }}"
                                    class="btn btn-edit"
                                >
                                    ✏ Edit
                                </a>

                                <form
                                    action="{{ route('ekskul.destroy', $item->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus ekstrakurikuler ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-hapus">
                                        🗑 Hapus
                                    </button>
                                </form>

                            </div>
                        @endif

                    </div>
                </article>

            @endforeach

        </div>

    @else

        <div class="kosong">
            <div class="icon">🎭</div>
            <h3>Belum Ada Data Ekstrakurikuler</h3>
            <p>Informasi ekstrakurikuler belum tersedia.</p>
        </div>

    @endif

    <div class="footer">
        © {{ date('Y') }} EKSERA — Sistem Informasi Ekstrakurikuler Seni dan Budaya
    </div>

</main>

</body>
</html>