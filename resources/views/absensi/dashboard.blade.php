<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Absensi - EKSERA</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f1f5f9;
            color: #263445;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #123b5d;
            color: white;
            position: fixed;
            padding: 28px 18px;
        }

        .brand {
            font-size: 25px;
            font-weight: bold;
            color: #8fd3ff;
            margin-bottom: 8px;
        }

        .subtitle {
            font-size: 11px;
            color: #d5e8f5;
            margin-bottom: 40px;
        }

        .menu {
            display: block;
            color: #e4edf5;
            text-decoration: none;
            padding: 14px;
            border-radius: 9px;
            margin-bottom: 9px;
            font-size: 14px;
        }

        .menu:hover,
        .menu.active {
            background: #24618d;
            color: white;
        }

        .main {
            margin-left: 250px;
            padding: 30px 35px;
        }

        .navbar {
            background: white;
            padding: 20px 25px;
            border-radius: 13px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            box-shadow: 0 3px 12px #00000008;
        }

        .navbar h2 {
            font-size: 21px;
        }

        .profile {
            color: #547086;
            font-size: 13px;
        }

        .welcome {
            margin-bottom: 25px;
        }

        .welcome h1 {
            font-size: 27px;
            margin-bottom: 9px;
            color: #123b5d;
        }

        .welcome p {
            color: #718096;
            font-size: 14px;
        }

        .date-box {
            background: white;
            padding: 18px 22px;
            border-radius: 12px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .date-box form {
            display: flex;
            gap: 10px;
        }

        input[type="date"] {
            padding: 10px;
            border: 1px solid #d5dee8;
            border-radius: 7px;
        }

        button, .btn {
            border: none;
            background: #145985;
            color: white;
            padding: 10px 17px;
            border-radius: 7px;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 23px;
            box-shadow: 0 3px 12px #00000008;
            border-left: 5px solid #24618d;
        }

        .card h3 {
            font-size: 14px;
            color: #718096;
            margin-bottom: 15px;
        }

        .card .number {
            font-size: 32px;
            font-weight: bold;
            color: #123b5d;
        }

        .card small {
            display: block;
            color: #8996a5;
            margin-top: 8px;
        }

        .hadir { border-color: #16a36a; }
        .izin { border-color: #e4a11b; }
        .sakit { border-color: #3688d8; }
        .alpa { border-color: #df5252; }
        .belum { border-color: #8794a5; }
        .peserta { border-color: #7656bd; }

        .action-box {
            background: white;
            padding: 28px;
            border-radius: 14px;
            box-shadow: 0 3px 12px #00000008;
        }

        .action-box h3 {
            color: #123b5d;
            margin-bottom: 10px;
        }

        .action-box p {
            color: #718096;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .logout {
            margin-top: 35px;
        }

        .logout button {
            width: 100%;
            background: #a83d48;
        }

        @media(max-width: 900px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
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
                padding: 18px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <div class="brand">EKSERA</div>
    <div class="subtitle">Sistem Informasi Ekstrakurikuler Seni dan Budaya</div>

    <a href="{{ route('dashboard.pembina') }}" class="menu">
        🏠 Dashboard Pembina
    </a>

    <a href="{{ route('absensi.dashboard') }}" class="menu active">
        📊 Dashboard Absensi
    </a>

    <a href="{{ route('absensi.index') }}" class="menu">
        📋 Input Absensi
    </a>

    <a href="{{ route('ekskul.index') }}" class="menu">
        🎨 Data Ekstrakurikuler
    </a>

    <div class="logout">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Keluar</button>
        </form>
    </div>
</aside>

<main class="main">

    <div class="navbar">
        <h2>Dashboard Absensi</h2>
        <div class="profile">
            Pembina: {{ Auth::user()->name }}
        </div>
    </div>

    <section class="welcome">
        <h1>Rekapitulasi Kehadiran</h1>
        <p>Pantau kehadiran peserta ekstrakurikuler EKSERA.</p>
    </section>

    <section class="date-box">
        <div>
            <strong>Data Absensi Berdasarkan Tanggal</strong>
            <p style="font-size:12px;color:#718096;margin-top:5px;">
                Pilih tanggal untuk melihat rekap kehadiran.
            </p>
        </div>

        <form action="{{ route('absensi.dashboard') }}" method="GET">
            <input type="date" name="tanggal" value="{{ $tanggal }}">
            <button type="submit">Tampilkan</button>
        </form>
    </section>

    <section class="cards">

        <div class="card peserta">
            <h3>Total Peserta Terdaftar</h3>
            <div class="number">{{ $totalPeserta }}</div>
            <small>Peserta dengan pendaftaran diterima</small>
        </div>

        <div class="card hadir">
            <h3>Hadir</h3>
            <div class="number">{{ $hadir }}</div>
            <small>Peserta hadir pada tanggal terpilih</small>
        </div>

        <div class="card izin">
            <h3>Izin</h3>
            <div class="number">{{ $izin }}</div>
            <small>Peserta izin</small>
        </div>

        <div class="card sakit">
            <h3>Sakit</h3>
            <div class="number">{{ $sakit }}</div>
            <small>Peserta sakit</small>
        </div>

        <div class="card alpa">
            <h3>Alpa</h3>
            <div class="number">{{ $alpa }}</div>
            <small>Peserta tanpa keterangan</small>
        </div>

        <div class="card belum">
            <h3>Belum Diabsen</h3>
            <div class="number">{{ $belumAbsen }}</div>
            <small>Peserta belum memiliki catatan absensi</small>
        </div>

    </section>

    <section class="action-box">
        <h3>Kelola Absensi Peserta</h3>
        <p>
            Klik tombol di bawah untuk mengisi atau memperbarui
            kehadiran peserta ekstrakurikuler.
        </p>

        <a href="{{ route('absensi.index', ['tanggal' => $tanggal]) }}" class="btn">
            📋 Buka Tabel Absensi
        </a>
    </section>

</main>

</body>
</html>