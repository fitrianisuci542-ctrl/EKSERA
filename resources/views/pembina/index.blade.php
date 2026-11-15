<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identitas Pembina - EKSERA</title>

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

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #14527f;
            color: white;
            padding: 20px 15px;
            display: flex;
            flex-direction: column;
        }

        .brand {
            margin-bottom: 32px;
        }

        .brand h1 {
            font-size: 29px;
            margin-bottom: 8px;
        }

        .brand h1 span {
            color: #8fd3ff;
        }

        .brand p {
            font-size: 12px;
            line-height: 1.6;
            color: #e0efff;
        }

        .menu-title {
            font-size: 11px;
            color: #c3dced;
            margin: 5px 12px 12px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            color: white;
            text-decoration: none;
            border-radius: 9px;
            font-size: 13px;
        }

        .menu a:hover,
        .menu a.active {
            background: #286d9f;
        }

        .logout {
            margin-top: auto;
        }

        .logout button {
            width: 100%;
            padding: 11px;
            border: 1px solid #8ab7d7;
            background: transparent;
            color: white;
            border-radius: 9px;
            cursor: pointer;
            font-size: 13px;
        }

        .main {
            margin-left: 250px;
            padding: 28px 30px;
            min-height: 100vh;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 23px;
        }

        .navbar h2 {
            color: #173d5e;
            font-size: 22px;
        }

        .navbar p {
            color: #718096;
            font-size: 12px;
            margin-top: 6px;
        }

        .admin {
            background: white;
            padding: 10px 15px;
            border-radius: 10px;
            font-size: 12px;
        }

        .header {
            background: linear-gradient(110deg, #14527f, #2786c4);
            padding: 27px 30px;
            border-radius: 15px;
            color: white;
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 23px;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 13px;
            line-height: 1.7;
            color: #e6f3ff;
        }

        .section-title {
            font-size: 19px;
            color: #263e57;
            margin-bottom: 15px;
        }

        .profile-card {
            background: white;
            border-radius: 15px;
            padding: 23px;
            display: flex;
            align-items: center;
            gap: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,.04);
            margin-bottom: 25px;
        }

        .profile-photo {
            width: 135px;
            height: 135px;
            min-width: 135px;
            border-radius: 50%;
            overflow: hidden;
            background: linear-gradient(135deg, #14527f, #49a5d9);
            border: 5px solid #e5f4ff;
            box-shadow: 0 4px 12px rgba(20,82,127,.15);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 40px;
            font-weight: bold;
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .profile-info h2 {
            color: #14527f;
            font-size: 24px;
            margin-bottom: 9px;
        }

        .position {
            display: inline-block;
            background: #e5f4ff;
            color: #14527f;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 13px;
        }

        .profile-info p {
            color: #718096;
            font-size: 12px;
            line-height: 1.8;
            margin-bottom: 5px;
        }

        .information {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .info-card {
            background: white;
            padding: 19px;
            border-radius: 13px;
            box-shadow: 0 3px 12px rgba(0,0,0,.03);
        }

        .info-card h3 {
            color: #14527f;
            font-size: 14px;
            margin-bottom: 9px;
        }

        .info-card p {
            color: #718096;
            font-size: 12px;
            line-height: 1.7;
        }

        .ekskul-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .ekskul-card {
            background: white;
            padding: 19px;
            border-radius: 13px;
            text-align: center;
            box-shadow: 0 3px 12px rgba(0,0,0,.035);
            border-bottom: 3px solid #2995d0;
        }

        .ekskul-icon {
            font-size: 31px;
            margin-bottom: 10px;
        }

        .ekskul-card h3 {
            color: #14527f;
            font-size: 15px;
            margin-bottom: 8px;
        }

        .ekskul-card p {
            color: #718096;
            font-size: 11px;
            line-height: 1.7;
        }

        .footer {
            text-align: center;
            color: #91a0af;
            font-size: 11px;
            padding: 20px;
            line-height: 1.7;
        }

        @media(max-width: 1000px) {
            .ekskul-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 18px 8px;
            }

            .brand h1 {
                font-size: 18px;
            }

            .brand p,
            .menu-title,
            .menu-text {
                display: none;
            }

            .menu a {
                justify-content: center;
                padding: 13px 5px;
            }

            .main {
                margin-left: 70px;
                padding: 20px 15px;
            }

            .profile-card {
                flex-direction: column;
                text-align: center;
            }

            .information,
            .ekskul-container {
                grid-template-columns: 1fr;
            }

            .navbar {
                flex-wrap: wrap;
                gap: 12px;
            }

            .header {
                padding: 22px;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <div class="brand">
        <h1>EKSERA<span>.</span></h1>
        <p>Sistem Informasi Ekstrakurikuler Seni dan Budaya</p>
    </div>

    <div class="menu-title">MENU UTAMA</div>

    <nav class="menu">
        <a href="{{ url('/dashboard') }}">🏠 <span class="menu-text">Dashboard</span></a>
        <a href="{{ url('/siswa') }}">👨‍🎓 <span class="menu-text">Data Siswa</span></a>
        <a href="{{ url('/ekskul') }}">🎭 <span class="menu-text">Data Ekstrakurikuler</span></a>
        <a href="{{ url('/pendaftaran') }}">📝 <span class="menu-text">Pendaftaran</span></a>
        <a href="{{ url('/pembina') }}" class="active">👨‍🏫 <span class="menu-text">Identitas Pembina</span></a>
        <a href="{{ url('/jadwal') }}">📅 <span class="menu-text">Jadwal Latihan</span></a>
        <a href="{{ url('/absensi') }}">📋 <span class="menu-text">Kehadiran</span></a>
    </nav>

    <div class="logout">
        <form action="{{ url('/logout') }}" method="POST">
            @csrf
            <button type="submit">Keluar / Logout</button>
        </form>
    </div>
</aside>

<main class="main">

    <header class="navbar">
        <div>
            <h2>Identitas Pembina</h2>
            <p>Informasi pembina ekstrakurikuler EKSERA.</p>
        </div>

        <div class="admin">
            👤 {{ auth()->user()->name ?? 'Administrator' }}
        </div>
    </header>

    <section class="header">
        <h1>Identitas Pembina EKSERA 👨‍🏫</h1>
        <p>
            Halaman informasi pembina utama yang bertanggung
            jawab membimbing kegiatan seni dan budaya
            di lingkungan EKSERA.
        </p>
    </section>

    <h2 class="section-title">Profil Pembina</h2>

    <section class="profile-card">
        <div class="profile-photo">
            <img
                src="{{ asset('images/pak-ludi.jpg') }}"
                alt="Foto Pak Ludi"
                onerror="
                    if (!this.dataset.coba) {
                        this.dataset.coba = '1';
                        this.src = '{{ asset('images/pak-ludi.jpeg') }}';
                    } else if (this.dataset.coba === '1') {
                        this.dataset.coba = '2';
                        this.src = '{{ asset('images/pak-ludi.png') }}';
                    } else if (this.dataset.coba === '2') {
                        this.dataset.coba = '3';
                        this.src = '{{ asset('images/pak-ludi.webp') }}';
                    } else {
                        this.remove();
                        this.parentElement.textContent = 'PL';
                    }
                ">
        </div>

        <div class="profile-info">
            <h2>Pak Ludi</h2>
            <span class="position">Pembina Utama EKSERA</span>

            <p>
                Pak Ludi merupakan pembina utama dalam
                kegiatan ekstrakurikuler seni dan budaya EKSERA.
            </p>

            <p>
                Bertanggung jawab membimbing dan mengarahkan
                siswa dalam mengembangkan bakat, kreativitas,
                kedisiplinan, serta kecintaan terhadap seni dan budaya daerah.
            </p>
        </div>
    </section>

    <h2 class="section-title">Informasi Pembina</h2>

    <section class="information">
        <div class="info-card">
            <h3>👤 Nama Pembina</h3>
            <p>Pak Ludi</p>
        </div>

        <div class="info-card">
            <h3>💼 Jabatan</h3>
            <p>Pembina Utama EKSERA</p>
        </div>

        <div class="info-card">
            <h3>🎭 Bidang Pembinaan</h3>
            <p>Seni dan Budaya</p>
        </div>

        <div class="info-card">
            <h3>🏫 Tanggung Jawab</h3>
            <p>Membimbing tiga kegiatan ekstrakurikuler seni dan budaya.</p>
        </div>
    </section>

    <h2 class="section-title">Ekstrakurikuler yang Dibina</h2>

    <section class="ekskul-container">
        <div class="ekskul-card">
            <div class="ekskul-icon">💃</div>
            <h3>Seni Tari</h3>
            <p>Mengembangkan kreativitas, keluwesan gerak, dan kecintaan terhadap seni tari tradisional.</p>
        </div>

        <div class="ekskul-card">
            <div class="ekskul-icon">🥋</div>
            <h3>Pencak Silat</h3>
            <p>Melatih kedisiplinan, ketangkasan, keberanian, dan kemampuan bela diri tradisional.</p>
        </div>

        <div class="ekskul-card">
            <div class="ekskul-icon">🎼</div>
            <h3>Karawitan</h3>
            <p>Mengenalkan seni musik tradisional, gamelan, irama, dan budaya daerah.</p>
        </div>
    </section>

    <footer class="footer">
        EKSERA © 2026
        <br>
        Sistem Informasi Ekstrakurikuler Seni dan Budaya
    </footer>

</main>

</body>
</html>