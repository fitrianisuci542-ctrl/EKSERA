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
            font-family: Arial, sans-serif;
        }

        body {
            background: #f3f6fb;
            color: #24364b;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #14527f;
            color: white;
            padding: 25px 17px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .brand {
            margin-bottom: 45px;
        }

        .brand h1 {
            font-size: 37px;
            letter-spacing: 1px;
            margin-bottom: 12px;
        }

        .brand h1 span {
            color: #8fd3ff;
        }

        .brand p {
            font-size: 14px;
            line-height: 1.7;
            color: #e0efff;
        }

        .menu-title {
            font-size: 12px;
            color: #c3dced;
            margin: 5px 14px 15px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 14px;
            color: white;
            text-decoration: none;
            border-radius: 11px;
            font-size: 15px;
            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: #286d9f;
        }

        .menu-icon {
            font-size: 19px;
        }

        .logout {
            margin-top: auto;
            padding-top: 25px;
        }

        .logout button {
            width: 100%;
            padding: 16px;
            border: 1px solid #8ab7d7;
            background: transparent;
            color: white;
            border-radius: 11px;
            cursor: pointer;
            font-size: 15px;
        }

        .logout button:hover {
            background: #286d9f;
        }

        /* MAIN */
        .main {
            margin-left: 260px;
            padding: 30px 35px;
            min-height: 100vh;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            gap: 15px;
        }

        .navbar h2 {
            font-size: 25px;
            color: #173d5e;
        }

        .navbar p {
            font-size: 13px;
            color: #718096;
            margin-top: 7px;
        }

        .admin-profile {
            background: white;
            padding: 12px 18px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            background: #d9efff;
            color: #14527f;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .admin-profile strong {
            font-size: 13px;
        }

        .admin-profile small {
            display: block;
            color: #8493a3;
            margin-top: 4px;
        }

        /* WELCOME */
        .welcome {
            background: linear-gradient(110deg, #14527f, #2786c4);
            padding: 40px;
            border-radius: 23px;
            color: white;
            margin-bottom: 35px;
        }

        .welcome h1 {
            font-size: 28px;
            margin-bottom: 17px;
        }

        .welcome p {
            font-size: 15px;
            line-height: 1.9;
            color: #e6f3ff;
        }

        /* SECTION */
        .section-title {
            font-size: 22px;
            color: #263e57;
            margin-bottom: 22px;
        }

        /* STATISTICS */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 20px;
            border-left: 5px solid #2995d0;
            box-shadow: 0 5px 20px rgba(0,0,0,.035);
        }

        .stat-icon {
            font-size: 24px;
            margin-bottom: 16px;
        }

        .stat-card p {
            color: #8291a3;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .stat-card h2 {
            font-size: 32px;
            color: #14527f;
        }

        /* PANEL */
        .panel {
            background: white;
            padding: 27px;
            border-radius: 19px;
            box-shadow: 0 5px 20px rgba(0,0,0,.035);
            margin-bottom: 30px;
        }

        .panel h3 {
            font-size: 20px;
            color: #14527f;
            margin-bottom: 20px;
        }

        /* PEMBINA */
        .coach-content {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .coach-avatar {
            width: 75px;
            height: 75px;
            flex-shrink: 0;
            background: #e4f3ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 37px;
        }

        .coach-info h4 {
            color: #14527f;
            font-size: 19px;
            margin-bottom: 8px;
        }

        .coach-info p {
            color: #718096;
            font-size: 13px;
            line-height: 1.8;
        }

        .coach-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 18px;
        }

        .coach-tags span {
            background: #e5f4ff;
            color: #14527f;
            padding: 9px 14px;
            border-radius: 20px;
            font-size: 12px;
        }

        /* GRID */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
            margin-bottom: 30px;
        }

        .activity {
            display: flex;
            gap: 15px;
            align-items: flex-start;
            padding: 17px 0;
            border-bottom: 1px solid #edf1f5;
        }

        .activity:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            background: #e5f4ff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
        }

        .activity h4 {
            color: #14527f;
            font-size: 15px;
            margin-bottom: 7px;
        }

        .activity p {
            color: #718096;
            font-size: 12px;
            line-height: 1.7;
        }

        /* BUTTON */
        .btn {
            display: inline-block;
            background: #14527f;
            color: white;
            padding: 12px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 13px;
            margin-top: 15px;
        }

        .btn:hover {
            background: #2477a8;
        }

        /* TABLE */
        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 550px;
        }

        th, td {
            padding: 16px 13px;
            text-align: left;
            border-bottom: 1px solid #edf1f5;
            font-size: 13px;
        }

        th {
            background: #f5f9fc;
            color: #61758a;
        }

        td {
            color: #40566b;
        }

        .empty {
            text-align: center;
            padding: 25px;
            color: #8493a3;
        }

        /* FOOTER */
        .footer {
            text-align: center;
            color: #91a0af;
            font-size: 12px;
            padding: 20px;
        }

        /* RESPONSIVE */
        @media(max-width: 1100px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width: 768px) {
            .sidebar {
                width: 75px;
                padding: 20px 9px;
            }

            .brand h1 {
                font-size: 19px;
            }

            .brand p,
            .menu-title,
            .menu-text {
                display: none;
            }

            .menu a {
                justify-content: center;
                padding: 15px 5px;
            }

            .main {
                margin-left: 75px;
                padding: 20px 15px;
            }

            .navbar {
                flex-wrap: wrap;
            }

            .welcome {
                padding: 25px;
            }

            .welcome h1 {
                font-size: 22px;
            }
        }

        @media(max-width: 480px) {
            .stats {
                grid-template-columns: 1fr;
            }

            .coach-content {
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">
            <h1>EKSERA<span>.</span></h1>

            <p>
                Sistem Informasi Ekstrakurikuler
                Seni dan Budaya
            </p>
        </div>

        <div class="menu-title">MENU UTAMA</div>

        <nav class="menu">

            <a href="{{ url('/dashboard') }}" class="active">
                <span class="menu-icon">🏠</span>
                <span class="menu-text">Dashboard</span>
            </a>

            <a href="{{ url('/siswa') }}">
                <span class="menu-icon">👨‍🎓</span>
                <span class="menu-text">Data Siswa</span>
            </a>

            <a href="{{ url('/ekskul') }}">
                <span class="menu-icon">🎭</span>
                <span class="menu-text">Data Ekstrakurikuler</span>
            </a>

            <a href="{{ url('/pendaftaran') }}">
                <span class="menu-icon">📝</span>
                <span class="menu-text">Pendaftaran</span>
            </a>

            <a href="#jadwal">
                <span class="menu-icon">📅</span>
                <span class="menu-text">Jadwal Latihan</span>
            </a>

            <a href="#kehadiran">
                <span class="menu-icon">📋</span>
                <span class="menu-text">Kehadiran</span>
            </a>

        </nav>

        <div class="logout">
            <form action="{{ url('/logout') }}" method="POST">
                @csrf
                <button type="submit">Keluar / Logout</button>
            </form>
        </div>

    </aside>

    <!-- MAIN -->
    <main class="main">

        <!-- NAVBAR -->
        <header class="navbar">

            <div>
                <h2>Dashboard Admin</h2>
                <p>Kelola sistem EKSERA dengan mudah dan terorganisir.</p>
            </div>

            <div class="admin-profile">
                <div class="admin-avatar">A</div>

                <div>
                    <strong>
                        {{ auth()->user()->name ?? 'Administrator' }}
                    </strong>
                    <small>Administrator</small>
                </div>
            </div>

        </header>

        <!-- WELCOME -->
        <section class="welcome">

            <h1>
                Selamat Datang,
                {{ auth()->user()->name ?? 'Administrator' }}!
            </h1>

            <p>
                Selamat datang di EKSERA – Sistem Informasi
                Ekstrakurikuler Seni dan Budaya.

                Kelola kegiatan Seni Tari, Pencak Silat,
                dan Karawitan melalui dashboard ini.
            </p>

        </section>

        <!-- STATISTIK -->
        <h3 class="section-title">Ringkasan Sistem</h3>

        <section class="stats">

            <div class="stat-card">
                <div class="stat-icon">🎭</div>
                <p>Total Ekstrakurikuler</p>
                <h2>{{ $jumlahEkskul ?? 0 }}</h2>
            </div>

            <div class="stat-card">
                <div class="stat-icon">👨‍🎓</div>
                <p>Total Siswa</p>
                <h2>{{ $jumlahSiswa ?? 0 }}</h2>
            </div>

            <div class="stat-card">
                <div class="stat-icon">📅</div>
                <p>Total Jadwal Latihan</p>
                <h2>{{ $jumlahJadwal ?? 0 }}</h2>
            </div>

            <div class="stat-card">
                <div class="stat-icon">📝</div>
                <p>Total Pendaftaran</p>
                <h2>{{ $jumlahPendaftaran ?? 0 }}</h2>
            </div>

        </section>

        <!-- IDENTITAS PEMBINA -->
        <section class="panel">

            <h3>Identitas Pembina EKSERA</h3>

            <div class="coach-content">

                <div class="coach-avatar">👨‍🏫</div>

                <div class="coach-info">

                    <h4>Pak Ludi</h4>

                    <p>
                        Pembina Utama EKSERA
                    </p>

                    <p>
                        Bertanggung jawab membina seluruh
                        kegiatan ekstrakurikuler seni dan budaya.
                    </p>

                </div>

            </div>

            <div class="coach-tags">
                <span>💃 Seni Tari</span>
                <span>🥋 Pencak Silat</span>
                <span>🎼 Karawitan</span>
            </div>

        </section>

        <!-- PENGELOLAAN SISTEM -->
        <h3 class="section-title">Pengelolaan Sistem</h3>

        <section class="content-grid">

            <!-- DATA SISWA -->
            <div class="panel">

                <h3>👨‍🎓 Data Siswa</h3>

                <p style="color:#718096; line-height:1.8; font-size:14px;">
                    Lihat dan kelola data siswa yang menggunakan
                    sistem informasi EKSERA.
                </p>

                <a href="{{ url('/siswa') }}" class="btn">
                    Buka Data Siswa
                </a>

            </div>

            <!-- DATA EKSKUL -->
            <div class="panel">

                <h3>🎭 Data Ekstrakurikuler</h3>

                <p style="color:#718096; line-height:1.8; font-size:14px;">
                    Kelola informasi Seni Tari, Pencak Silat,
                    dan Karawitan beserta jadwal, lokasi,
                    dan deskripsinya.
                </p>

                <a href="{{ url('/ekskul') }}" class="btn">
                    Buka Data Ekstrakurikuler
                </a>

            </div>

        </section>

        <!-- INFORMASI KEGIATAN -->
        <section class="panel">

            <h3>Informasi Seni dan Budaya EKSERA</h3>

            <div class="activity">

                <div class="activity-icon">💃</div>

                <div>
                    <h4>Seni Tari</h4>

                    <p>
                        Kegiatan yang mengembangkan kreativitas,
                        keluwesan gerak, serta kecintaan siswa
                        terhadap seni tari tradisional.
                    </p>
                </div>

            </div>

            <div class="activity">

                <div class="activity-icon">🥋</div>

                <div>
                    <h4>Pencak Silat</h4>

                    <p>
                        Kegiatan seni bela diri tradisional
                        untuk membangun kedisiplinan,
                        ketangkasan, dan kepercayaan diri.
                    </p>
                </div>

            </div>

            <div class="activity">

                <div class="activity-icon">🎼</div>

                <div>
                    <h4>Karawitan</h4>

                    <p>
                        Kegiatan seni musik tradisional
                        untuk mengenalkan gamelan,
                        irama, dan budaya daerah.
                    </p>
                </div>

            </div>

        </section>

        <!-- JADWAL -->
        <section class="panel" id="jadwal">

            <h3>📅 Jadwal Latihan Ekstrakurikuler</h3>

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ekstrakurikuler</th>
                            <th>Hari</th>
                            <th>Jam Latihan</th>
                            <th>Lokasi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($jadwals ?? [] as $index => $jadwal)

                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td>
                                    {{ $jadwal->nama_ekskul }}
                                </td>

                                <td>
                                    {{ $jadwal->hari }}
                                </td>

                                <td>
                                    {{ $jadwal->jam_mulai }}
                                    -
                                    {{ $jadwal->jam_selesai }}
                                </td>

                                <td>
                                    {{ $jadwal->lokasi }}
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="empty">
                                    Belum ada jadwal latihan.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>

        <!-- KEHADIRAN -->
        <section class="panel" id="kehadiran">

            <h3>📋 Informasi Kehadiran</h3>

            <p style="font-size:14px; color:#718096; line-height:1.8;">
                Kehadiran siswa dalam kegiatan ekstrakurikuler
                dapat dikelola melalui halaman kehadiran.
                Pastikan setiap kegiatan memiliki catatan
                kehadiran yang teratur.
            </p>

        </section>

        <!-- FOOTER -->
        <footer class="footer">

            EKSERA © 2026

            <br>

            Sistem Informasi Ekstrakurikuler Seni dan Budaya

        </footer>

    </main>

</body>
</html>