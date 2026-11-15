<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Absensi | EKSERA</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f2f6fb;
            color: #263445;
        }

        .sidebar {
            position: fixed;
            width: 245px;
            height: 100vh;
            background: #123f68;
            color: white;
            padding: 25px 18px;
        }

        .brand {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .subtitle {
            font-size: 11px;
            color: #b9d8ef;
            margin-bottom: 35px;
        }

        .menu {
            display: block;
            color: #e5f1fa;
            text-decoration: none;
            padding: 13px 15px;
            border-radius: 9px;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .menu:hover,
        .menu.active {
            background: #2677ae;
            color: white;
        }

        .main {
            margin-left: 245px;
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 15px;
        }

        .header h1 {
            font-size: 25px;
            color: #123f68;
        }

        .header p {
            color: #718096;
            font-size: 13px;
            margin-top: 6px;
        }

        .card {
            background: white;
            padding: 23px;
            border-radius: 13px;
            box-shadow: 0 3px 15px rgba(20, 60, 90, .06);
            margin-bottom: 22px;
        }

        .filter {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: end;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        label {
            font-size: 13px;
            font-weight: bold;
            color: #43566b;
        }

        input, select {
            padding: 10px 12px;
            border: 1px solid #d9e3ed;
            border-radius: 7px;
            min-width: 170px;
            outline: none;
        }

        button, .reset {
            border: none;
            border-radius: 7px;
            padding: 11px 17px;
            background: #176da5;
            color: white;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
        }

        .reset {
            background: #718096;
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
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid #edf1f5;
            font-size: 13px;
        }

        th {
            background: #edf5fb;
            color: #174c75;
        }

        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .hadir { background: #d9f5e5; color: #16834b; }
        .izin { background: #fff0c9; color: #9b6a00; }
        .sakit { background: #dcecff; color: #2366a5; }
        .alpa { background: #ffe0e0; color: #b52c2c; }

        .success {
            background: #d9f5e5;
            color: #16834b;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: #8493a3;
        }

        .pagination {
            margin-top: 20px;
        }

        @media(max-width: 768px) {
            .sidebar {
                position: static;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
                padding: 18px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="brand">EKSERA</div>
    <div class="subtitle">Sistem Informasi Ekstrakurikuler Seni dan Budaya</div>

    <a href="{{ route('dashboard.pembina') }}" class="menu">🏠 Dashboard</a>
    <a href="{{ route('absensi.index') }}" class="menu">📋 Input Absensi</a>
    <a href="{{ route('absensi.riwayat') }}" class="menu active">📚 Riwayat Absensi</a>
    <a href="{{ route('ekskul.index') }}" class="menu">🎨 Data Ekstrakurikuler</a>

    <form action="{{ route('logout') }}" method="POST" style="margin-top:25px;">
        @csrf
        <button type="submit" style="width:100%;background:#a94444;">Keluar</button>
    </form>
</aside>

<main class="main">

    <div class="header">
        <div>
            <h1>Riwayat Absensi</h1>
            <p>Daftar kehadiran siswa yang telah disimpan di EKSERA.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <section class="card">
        <form action="{{ route('absensi.riwayat') }}" method="GET" class="filter">

            <div class="field">
                <label>Tanggal Absensi</label>
                <input type="date" name="tanggal" value="{{ request('tanggal') }}">
            </div>

            <div class="field">
                <label>Status Kehadiran</label>
                <select name="status">
                    <option value="">Semua Status</option>
                    <option value="hadir" {{ request('status') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="izin" {{ request('status') == 'izin' ? 'selected' : '' }}>Izin</option>
                    <option value="sakit" {{ request('status') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                    <option value="alpa" {{ request('status') == 'alpa' ? 'selected' : '' }}>Alpa</option>
                </select>
            </div>

            <button type="submit">Cari Data</button>
            <a href="{{ route('absensi.riwayat') }}" class="reset">Reset</a>

        </form>
    </section>

    <section class="card">
        <h3 style="color:#123f68;margin-bottom:20px;">Data Riwayat Kehadiran Siswa</h3>

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
                    @forelse($riwayat as $item)
                        <tr>
                            <td>{{ $riwayat->firstItem() + $loop->index }}</td>
                            <td>{{ $item->pendaftaran->user->name ?? '-' }}</td>
                            <td>{{ $item->pendaftaran->ekskul->nama_ekskul ?? '-' }}</td>
                            <td>{{ $item->tanggal->format('d-m-Y') }}</td>
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
                                Belum ada riwayat absensi yang tersimpan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination">
            {{ $riwayat->links() }}
        </div>
    </section>

</main>
</body>
</html>