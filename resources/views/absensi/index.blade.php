<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Absensi Peserta | EKSERA</title>

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
            width: 100%;
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
            padding: 25px 28px;
            border-radius: 15px;
            margin-bottom: 25px;
            box-shadow: 0 7px 20px rgba(20,82,127,.12);
        }

        .welcome h2 {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .welcome p {
            font-size: 13px;
            line-height: 1.7;
            color: #e4f3ff;
        }

        .section-title {
            color: #193f60;
            font-size: 17px;
            margin: 25px 0 14px;
        }

        .card {
            background: white;
            border-radius: 13px;
            padding: 22px;
            border: 1px solid #e8eef4;
            box-shadow: 0 3px 12px rgba(30,65,95,.04);
            margin-bottom: 18px;
        }

        .card h3 {
            color: #19496f;
            font-size: 16px;
            margin-bottom: 17px;
        }

        .filter {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        input, select {
            padding: 10px 12px;
            border: 1px solid #d5dde5;
            border-radius: 7px;
            outline: none;
            background: white;
            color: #34495c;
            font-size: 13px;
        }

        input:focus, select:focus {
            border-color: #2879b9;
        }

        .btn {
            padding: 10px 17px;
            border: none;
            border-radius: 7px;
            background: #2879b9;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 13px;
        }

        .btn:hover {
            background: #185b91;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 13px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 13px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th, td {
            padding: 13px 12px;
            border-bottom: 1px solid #edf0f4;
            text-align: left;
            font-size: 13px;
        }

        th {
            background: #edf5fb;
            color: #123e65;
            font-weight: 600;
        }

        td {
            color: #526577;
        }

        td select {
            min-width: 115px;
        }

        td input {
            min-width: 140px;
        }

        .save {
            margin-top: 20px;
            padding: 12px 22px;
            border: none;
            border-radius: 8px;
            background: #16834a;
            color: white;
            font-weight: bold;
            font-size: 13px;
            cursor: pointer;
        }

        .save:hover {
            background: #116b3c;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #8291a0;
        }

        .footer {
            text-align: center;
            color: #98a6b3;
            font-size: 11px;
            margin-top: 25px;
            padding-bottom: 10px;
        }

        @media(max-width: 900px) {
            .main {
                padding: 25px 20px;
            }
        }

        @media(max-width: 650px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
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

            .welcome {
                padding: 22px 20px;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <div class="brand">
        <h2>EKSERA.</h2>
        <p>Sistem Informasi Ekstrakurikuler Seni dan Budaya</p>
    </div>

    <div class="menu-title">Menu Utama</div>

    <a href="{{ route('dashboard.pembina') }}" class="menu">
        <span>⌂</span> Dashboard
    </a>

    <a href="{{ route('absensi.index') }}" class="menu active">
        <span>▣</span> Absensi Peserta
    </a>

    <a href="{{ route('ekskul.index') }}" class="menu">
        <span>♫</span> Data Ekstrakurikuler
    </a>

    <a href="{{ url('/jadwal') }}" class="menu">
        <span>◷</span> Jadwal Latihan
    </a>

    <div class="menu-title">Akun</div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout">↪ Keluar</button>
    </form>
</aside>

<main class="main">

    <div class="topbar">
        <div>
            <h1>Absensi Peserta</h1>
            <p>Kelola dan catat kehadiran peserta ekstrakurikuler.</p>
        </div>
        <span class="role">PEMBINA</span>
    </div>

    <section class="welcome">
        <h2>Pengelolaan Absensi EKSERA 📋</h2>
        <p>
            Halaman ini digunakan untuk mencatat kehadiran siswa
            dalam kegiatan Seni Tari, Pencak Silat, dan Karawitan.
            Pilih tanggal, tentukan status kehadiran, lalu simpan data.
        </p>
    </section>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="error">
            <strong>Terjadi kesalahan:</strong>
            <ul style="margin:8px 0 0 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h3 class="section-title">Filter Absensi</h3>

    <section class="card">
        <h3>📅 Pilih Tanggal Kehadiran</h3>

        <form action="{{ route('absensi.index') }}" method="GET" class="filter">
            <input
                type="date"
                name="tanggal"
                value="{{ $tanggal }}"
                required
            >

            <button type="submit" class="btn">Tampilkan</button>
        </form>
    </section>

    <h3 class="section-title">Data Kehadiran Peserta</h3>

    <section class="card">
        <h3>📋 Daftar Kehadiran Siswa</h3>

        <form action="{{ route('absensi.store') }}" method="POST">
            @csrf

            <input type="hidden" name="tanggal" value="{{ $tanggal }}">

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Siswa</th>
                            <th>Ekstrakurikuler</th>
                            <th>Status Kehadiran</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($pendaftarans as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    {{ $item->user->name ?? 'Nama tidak tersedia' }}
                                </td>

                                <td>
                                    {{ $item->ekskul->nama_ekskul ?? '-' }}
                                </td>

                                <td>
                                    <select
                                        name="absensi[{{ $item->id }}][status]"
                                        required
                                    >
                                        <option value="">Pilih Status</option>

                                        @foreach(['hadir','izin','sakit','alpa'] as $status)
                                            <option
                                                value="{{ $status }}"
                                                @selected(
                                                    old(
                                                        "absensi.{$item->id}.status",
                                                        optional($absensis->get($item->id))->status
                                                    ) === $status
                                                )
                                            >
                                                {{ ucfirst($status) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>

                                <td>
                                    <input
                                        type="text"
                                        name="absensi[{{ $item->id }}][catatan]"
                                        placeholder="Catatan..."
                                        value="{{ old(
                                            "absensi.{$item->id}.catatan",
                                            optional($absensis->get($item->id))->catatan
                                        ) }}"
                                    >
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty">
                                    Belum ada peserta yang diterima.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($pendaftarans->isNotEmpty())
                <button type="submit" class="save">
                    💾 Simpan Absensi
                </button>
            @endif
        </form>
    </section>

    <div class="footer">
        © {{ date('Y') }} EKSERA — Sistem Informasi Ekstrakurikuler Seni dan Budaya
    </div>

</main>

</body>
</html>