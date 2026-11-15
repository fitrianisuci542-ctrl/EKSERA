<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa | EKSERA</title>

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
            font-size: 13px;
        }

        .sidebar {
            width: 245px;
            height: 100vh;
            background: #123f68;
            position: fixed;
            top: 0;
            left: 0;
            padding: 24px 17px;
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
            margin-bottom: 30px;
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
            margin-bottom: 6px;
            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: #2786c4;
            color: white;
        }

        .logout-form {
            margin-top: 28px;
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

        .main {
            margin-left: 245px;
            min-height: 100vh;
        }

        .navbar {
            min-height: 65px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 28px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
        }

        .navbar h2 {
            color: #14527f;
            font-size: 18px;
        }

        .admin {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #52677c;
            font-size: 12px;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #e0f1ff;
            color: #14527f;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .content {
            padding: 25px 30px;
        }

        .welcome {
            background: linear-gradient(120deg, #14527f, #2786c4);
            color: white;
            padding: 23px 26px;
            border-radius: 13px;
            margin-bottom: 24px;
        }

        .welcome h1 {
            font-size: 21px;
            margin-bottom: 8px;
        }

        .welcome p {
            font-size: 12px;
            color: #e3f3ff;
            line-height: 1.7;
        }

        .section-title {
            color: #173d61;
            font-size: 17px;
            margin-bottom: 14px;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 23px;
        }

        .summary-card {
            background: white;
            padding: 17px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            gap: 13px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
        }

        .summary-icon {
            width: 43px;
            height: 43px;
            border-radius: 10px;
            background: #e5f3ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .summary-card h3 {
            font-size: 21px;
            color: #14527f;
            margin-bottom: 3px;
        }

        .summary-card p {
            font-size: 11px;
            color: #8291a2;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #e4ebf4;
            box-shadow: 0 3px 12px rgba(24,54,85,.04);
        }

        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 17px;
        }

        .card-top h3 {
            color: #173d61;
            font-size: 15px;
        }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            background: #17649b;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 11px;
        }

        .btn:hover {
            background: #104a75;
        }

        .btn-edit {
            background: #e7f2ff;
            color: #175b8b;
        }

        .btn-delete {
            background: #feecec;
            color: #c0392b;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .actions form {
            margin: 0;
        }

        .alert {
            padding: 11px 14px;
            background: #e1f7e9;
            color: #17653a;
            border-radius: 7px;
            margin-bottom: 15px;
            font-size: 12px;
        }

        .alert-error {
            background: #feecec;
            color: #b42318;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
        }

        th {
            background: #edf5fc;
            color: #245477;
            text-align: left;
            padding: 12px 10px;
            font-size: 11px;
            white-space: nowrap;
        }

        td {
            padding: 12px 10px;
            border-bottom: 1px solid #e9eef5;
            font-size: 11px;
            line-height: 1.5;
        }

        tbody tr:hover {
            background: #f8fbff;
        }

        .empty {
            text-align: center;
            color: #7d8fa3;
            padding: 28px;
        }

        .table-note {
            font-size: 10px;
            color: #8291a2;
            margin-top: 12px;
        }

        .mobile-nav {
            display: none;
        }

        @media(max-width: 950px) {
            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
            }

            .content {
                padding: 20px 17px;
            }

            .summary {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 600px) {
            .sidebar {
                display: none;
            }

            .mobile-nav {
                display: block;
                padding: 14px;
                background: #123f68;
                color: white;
            }

            .mobile-brand {
                font-size: 21px;
                font-weight: bold;
                margin-bottom: 12px;
            }

            .mobile-brand span {
                color: #8fd3ff;
            }

            .mobile-links {
                display: flex;
                flex-wrap: wrap;
                gap: 6px;
            }

            .mobile-links a {
                padding: 8px 10px;
                border-radius: 6px;
                background: #205a87;
                color: white;
                text-decoration: none;
                font-size: 11px;
            }

            .mobile-links a.active {
                background: #8fd3ff;
                color: #173b60;
            }

            .main {
                margin-left: 0;
            }

            .navbar {
                padding: 11px 13px;
            }

            .navbar h2 {
                font-size: 16px;
            }

            .content {
                padding: 15px 12px;
            }

            .welcome {
                padding: 18px;
            }

            .welcome h1 {
                font-size: 19px;
            }

            .summary {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 13px;
            }

            .card-top {
                align-items: stretch;
                flex-direction: column;
            }

            .card-top .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

@php
    $totalSiswa = $siswas->count();
@endphp

<aside class="sidebar">

    <div class="brand">EKSE<span>RA</span></div>

    <div class="brand-desc">
        Sistem Informasi Ekstrakurikuler Seni dan Budaya
    </div>

    <div class="menu-title">Menu Utama</div>

    <nav class="menu">
        <a href="{{ route('dashboard.admin') }}">🏠 Dashboard</a>
        <a href="{{ route('siswa.index') }}" class="active">👨‍🎓 Data Siswa</a>
        <a href="{{ route('ekskul.index') }}">🎨 Data Ekstrakurikuler</a>
        <a href="{{ route('admin.pendaftaran.index') }}">📝 Data Pendaftaran</a>
        <a href="{{ route('jadwal.index') }}">📅 Jadwal Latihan</a>
        <a href="{{ route('event.index') }}">🎭 Informasi Event</a>
    </nav>

    <div class="menu-title">Pengelolaan</div>

    <nav class="menu">
        <a href="{{ route('siswa.create') }}">➕ Tambah Siswa</a>
        <a href="{{ route('ekskul.create') }}">➕ Tambah Ekstrakurikuler</a>
    </nav>

    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="logout-btn">Keluar ↗</button>
    </form>

</aside>

<nav class="mobile-nav">
    <div class="mobile-brand">EKSE<span>RA</span></div>

    <div class="mobile-links">
        <a href="{{ route('dashboard.admin') }}">🏠 Dashboard</a>
        <a href="{{ route('siswa.index') }}" class="active">👨‍🎓 Data Siswa</a>
        <a href="{{ route('ekskul.index') }}">🎨 Data Ekskul</a>
        <a href="{{ route('admin.pendaftaran.index') }}">📝 Pendaftaran</a>
        <a href="{{ route('jadwal.index') }}">📅 Jadwal</a>
        <a href="{{ route('event.index') }}">🎭 Event</a>
        <a href="{{ route('siswa.create') }}">➕ Tambah Siswa</a>
    </div>
</nav>

<main class="main">

    <header class="navbar">
        <h2>Data Siswa</h2>

        <div class="admin">
            <div class="avatar">A</div>
            <span>{{ auth()->user()->name }} | Admin</span>
        </div>
    </header>

    <section class="content">

        <div class="welcome">
            <h1>Pengelolaan Data Siswa 👨‍🎓</h1>
            <p>
                Kelola informasi siswa EKSERA dengan mudah.
                Kamu dapat melihat, menambahkan, mengubah, dan menghapus
                data siswa melalui halaman ini.
            </p>
        </div>

        <h3 class="section-title">Ringkasan Data</h3>

        <section class="summary">

            <div class="summary-card">
                <div class="summary-icon">👨‍🎓</div>
                <div>
                    <h3>{{ $totalSiswa }}</h3>
                    <p>Total Data Siswa</p>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon">📋</div>
                <div>
                    <h3>{{ $totalSiswa }}</h3>
                    <p>Siswa Terdaftar</p>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon">🏫</div>
                <div>
                    <h3>EKSERA</h3>
                    <p>Data Siswa Sekolah</p>
                </div>
            </div>

        </section>

        <h3 class="section-title">Daftar Siswa</h3>

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">

            <div class="card-top">
                <h3>📋 Data Siswa Terdaftar</h3>

                <a href="{{ route('siswa.create') }}" class="btn">
                    + Tambah Siswa
                </a>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Jenis Kelamin</th>
                            <th>No. HP</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($siswas as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nis }}</td>
                                <td><strong>{{ $item->nama }}</strong></td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->jurusan ?? '-' }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->no_hp ?? '-' }}</td>
                                <td>{{ $item->alamat ?? '-' }}</td>
                                <td>
                                    <div class="actions">
                                        <a class="btn btn-edit"
                                           href="{{ route('siswa.edit', $item->id) }}">
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('siswa.destroy', $item->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-delete">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="empty">
                                    Belum ada data siswa.
                                    Klik Tambah Siswa untuk menambahkan data.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <p class="table-note">
                Geser tabel ke kanan atau kiri untuk melihat seluruh data siswa.
            </p>

        </div>

    </section>

</main>

</body>
</html>