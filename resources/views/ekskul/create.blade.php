<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ekstrakurikuler - EKSERA</title>

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
        }

        .brand {
            margin-bottom: 45px;
        }

        .brand h1 {
            font-size: 37px;
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
            padding: 15px;
            border: 1px solid #8ab7d7;
            background: transparent;
            color: white;
            border-radius: 11px;
            cursor: pointer;
        }

        /* MAIN */
        .main {
            margin-left: 260px;
            padding: 35px;
            min-height: 100vh;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .navbar h2 {
            color: #173d5e;
            font-size: 25px;
        }

        .navbar p {
            color: #718096;
            font-size: 13px;
            margin-top: 7px;
        }

        .admin {
            background: white;
            padding: 13px 18px;
            border-radius: 12px;
            font-size: 13px;
        }

        /* HEADER */
        .header {
            background: linear-gradient(110deg, #14527f, #2786c4);
            padding: 35px;
            border-radius: 20px;
            color: white;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 27px;
            margin-bottom: 12px;
        }

        .header p {
            line-height: 1.8;
            font-size: 14px;
        }

        /* FORM */
        .form-card {
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(0,0,0,.04);
        }

        .form-card h2 {
            color: #14527f;
            margin-bottom: 25px;
            font-size: 22px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 22px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            color: #34536e;
        }

        input, select, textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d9e3ed;
            border-radius: 9px;
            outline: none;
            font-size: 14px;
            background: white;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #2786c4;
        }

        textarea {
            resize: vertical;
            min-height: 110px;
        }

        .photo-box {
            border: 2px dashed #9dc9e5;
            border-radius: 12px;
            padding: 22px;
            background: #f5faff;
        }

        .photo-box p {
            color: #718096;
            font-size: 12px;
            margin-top: 10px;
            line-height: 1.6;
        }

        #preview {
            display: none;
            width: 220px;
            max-width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            margin-top: 15px;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 13px 22px;
            border-radius: 9px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-save {
            background: #14527f;
            color: white;
        }

        .btn-save:hover {
            background: #2786c4;
        }

        .btn-back {
            background: #e8edf3;
            color: #40566b;
        }

        .error-box {
            background: #fff0f0;
            padding: 15px;
            border-radius: 9px;
            margin-bottom: 20px;
            color: #c0392b;
        }

        .error-box ul {
            padding-left: 20px;
            margin-top: 8px;
        }

        .footer {
            text-align: center;
            color: #91a0af;
            font-size: 12px;
            padding: 30px;
            line-height: 1.8;
        }

        /* RESPONSIVE */
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

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }

            .form-card {
                padding: 22px;
            }

            .navbar {
                flex-wrap: wrap;
                gap: 15px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">
            <h1>EKSERA<span>.</span></h1>
            <p>Sistem Informasi Ekstrakurikuler Seni dan Budaya</p>
        </div>

        <div class="menu-title">MENU UTAMA</div>

        <nav class="menu">
            <a href="{{ url('/dashboard') }}">
                🏠 <span class="menu-text">Dashboard</span>
            </a>

            <a href="{{ url('/siswa') }}">
                👨‍🎓 <span class="menu-text">Data Siswa</span>
            </a>

            <a href="{{ url('/ekskul') }}" class="active">
                🎭 <span class="menu-text">Data Ekstrakurikuler</span>
            </a>

            <a href="{{ url('/pendaftaran') }}">
                📝 <span class="menu-text">Pendaftaran</span>
            </a>

            <a href="{{ url('/pembina') }}">
                👨‍🏫 <span class="menu-text">Identitas Pembina</span>
            </a>

            <a href="{{ url('/jadwal') }}">
                📅 <span class="menu-text">Jadwal Latihan</span>
            </a>

            <a href="{{ url('/absensi') }}">
                📋 <span class="menu-text">Kehadiran</span>
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

        <header class="navbar">
            <div>
                <h2>Tambah Ekstrakurikuler</h2>
                <p>Tambahkan kegiatan baru ke dalam sistem EKSERA.</p>
            </div>

            <div class="admin">
                👤 {{ auth()->user()->name ?? 'Administrator' }}
            </div>
        </header>

        <!-- HEADER -->
        <section class="header">
            <h1>Tambah Kegiatan EKSERA 🎭</h1>

            <p>
                Masukkan informasi kegiatan Seni Tari,
                Pencak Silat, atau Karawitan.
                Lengkapi dengan foto agar siswa dapat
                mengenal kegiatan yang tersedia.
            </p>
        </section>

        <!-- FORMULIR -->
        <section class="form-card">

            <h2>📝 Formulir Ekstrakurikuler</h2>

            @if ($errors->any())
                <div class="error-box">
                    <strong>Periksa kembali formulir:</strong>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('ekskul.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="form-grid">

                    <!-- NAMA EKSKUL -->
                    <div class="form-group">
                        <label>Nama Ekstrakurikuler *</label>

                        <select name="nama_ekskul" required>
                            <option value="">-- Pilih Kegiatan --</option>

                            <option value="Seni Tari"
                                {{ old('nama_ekskul') == 'Seni Tari' ? 'selected' : '' }}>
                                Seni Tari
                            </option>

                            <option value="Pencak Silat"
                                {{ old('nama_ekskul') == 'Pencak Silat' ? 'selected' : '' }}>
                                Pencak Silat
                            </option>

                            <option value="Karawitan"
                                {{ old('nama_ekskul') == 'Karawitan' ? 'selected' : '' }}>
                                Karawitan
                            </option>
                        </select>
                    </div>

                    <!-- PEMBINA -->
                    <div class="form-group">
                        <label>Nama Pembina *</label>

                        <input
                            type="text"
                            name="pembina"
                            value="{{ old('pembina', 'Pak Ludi') }}"
                            required
                        >
                    </div>

                    <!-- HARI -->
                    <div class="form-group">
                        <label>Hari Latihan *</label>

                        <select name="hari" required>
                            <option value="">-- Pilih Hari --</option>

                            @foreach (['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                                <option value="{{ $hari }}"
                                    {{ old('hari') == $hari ? 'selected' : '' }}>
                                    {{ $hari }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- LOKASI -->
                    <div class="form-group">
                        <label>Lokasi Latihan *</label>

                        <input
                            type="text"
                            name="lokasi"
                            placeholder="Contoh: Aula Sekolah"
                            value="{{ old('lokasi') }}"
                            required
                        >
                    </div>

                    <!-- JAM MULAI -->
                    <div class="form-group">
                        <label>Jam Mulai *</label>

                        <input
                            type="time"
                            name="jam_mulai"
                            value="{{ old('jam_mulai') }}"
                            required
                        >
                    </div>

                    <!-- JAM SELESAI -->
                    <div class="form-group">
                        <label>Jam Selesai *</label>

                        <input
                            type="time"
                            name="jam_selesai"
                            value="{{ old('jam_selesai') }}"
                            required
                        >
                    </div>

                    <!-- DESKRIPSI -->
                    <div class="form-group full">
                        <label>Deskripsi Kegiatan</label>

                        <textarea
                            name="deskripsi"
                            placeholder="Jelaskan kegiatan, manfaat, dan hal menarik dari ekstrakurikuler ini..."
                        >{{ old('deskripsi') }}</textarea>
                    </div>

                    <!-- FOTO -->
                    <div class="form-group full">
                        <label>Foto Ekstrakurikuler</label>

                        <div class="photo-box">

                            <input
                                type="file"
                                name="foto"
                                id="foto"
                                accept="image/jpeg,image/png,image/jpg,image/webp"
                            >

                            <p>
                                Format JPG, JPEG, PNG, atau WEBP.
                                Maksimal ukuran 2 MB.
                            </p>

                            <img id="preview" alt="Preview foto kegiatan">

                        </div>
                    </div>

                </div>

                <!-- BUTTON -->
                <div class="buttons">

                    <button type="submit" class="btn btn-save">
                        💾 Simpan Kegiatan
                    </button>

                    <a href="{{ route('ekskul.index') }}" class="btn btn-back">
                        Kembali
                    </a>

                </div>

            </form>

        </section>

        <footer class="footer">
            EKSERA © 2026
            <br>
            Sistem Informasi Ekstrakurikuler Seni dan Budaya
        </footer>

    </main>

    <!-- PREVIEW FOTO -->
    <script>
        document.getElementById('foto').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');

            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        });
    </script>

</body>
</html>