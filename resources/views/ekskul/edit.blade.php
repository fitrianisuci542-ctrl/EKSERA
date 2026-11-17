<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kegiatan Seni - EKSERA</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6fb;
            color: #18324d;
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 250px;
            padding: 25px 0;
            background: #154f80;
            color: white;
        }

        .logo {
            padding: 0 20px;
            font-size: 27px;
            font-weight: bold;
        }

        .logo span { color: #8fd3ff; }

        .subtitle {
            padding: 18px 20px 30px;
            border-bottom: 1px solid #42749b;
            text-align: center;
        }

        .menu-title {
            padding: 25px 20px 10px;
            color: #b7d9f3;
            font-size: 12px;
        }

        .menu {
            display: block;
            padding: 15px 20px;
            margin-right: 15px;
            color: white;
            text-decoration: none;
            border-radius: 0 12px 12px 0;
        }

        .menu:hover, .active { background: #286b9d; }

        .main { margin-left: 250px; }

        .navbar {
            height: 75px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            background: white;
            border-bottom: 1px solid #e3eaf2;
        }

        .navbar h2 { font-size: 23px; }

        .admin { color: #52677c; }

        .content { padding: 30px; }

        .banner {
            padding: 25px 30px;
            margin-bottom: 25px;
            border-radius: 18px;
            color: white;
            background: linear-gradient(110deg, #155486, #258bc6);
        }

        .banner h1 { margin-top: 0; }

        .card {
            padding: 28px;
            border-radius: 18px;
            background: white;
            border: 1px solid #e4ebf4;
            box-shadow: 0 5px 20px #1836550a;
            max-width: 1000px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .field { margin-bottom: 18px; }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 14px;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced9e5;
            border-radius: 9px;
            font: inherit;
            background: white;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .full { grid-column: 1 / -1; }

        .photo-preview {
            width: 220px;
            max-width: 100%;
            height: 145px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
            display: block;
        }

        .help {
            font-size: 12px;
            color: #687b8d;
            margin-top: 7px;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border: 0;
            border-radius: 9px;
            background: #17649b;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-cancel {
            background: #e7edf4;
            color: #34495e;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 8px;
        }

        .error-box {
            color: #c0392b;
            background: #fff0f0;
            padding: 15px;
            border-radius: 9px;
            margin-bottom: 20px;
        }

        @media(max-width: 750px) {
            .sidebar { width: 75px; }
            .logo { font-size: 0; padding: 10px; }
            .logo span, .subtitle, .menu-title { display: none; }
            .menu { font-size: 0; padding: 18px 10px; }
            .main { margin-left: 75px; }
            .content { padding: 15px; }
            .grid { grid-template-columns: 1fr; gap: 0; }
            .full { grid-column: auto; }
            .navbar { padding: 0 15px; }
        }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="logo">EKSERA<span>.</span></div>
    <div class="subtitle">Sistem Informasi Seni dan Budaya</div>

    <div class="menu-title">MENU UTAMA</div>
    <a class="menu" href="{{ route('dashboard') }}">🏠 Dashboard</a>
    <a class="menu active" href="{{ route('ekskul.index') }}">🎭 Kegiatan Seni</a>
</aside>

<main class="main">

    <header class="navbar">
        <h2>Edit Kegiatan Seni</h2>
        <div class="admin">Administrator</div>
    </header>

    <section class="content">

        <div class="banner">
            <h1>✏️ Edit Ekstrakurikuler</h1>
            <p>Perbarui informasi kegiatan seni dan budaya EKSERA.</p>
        </div>

        <div class="card">

            @if ($errors->any())
                <div class="error-box">
                    <strong>Periksa kembali data berikut:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('ekskul.update', $ekskul->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="grid">

                    <div class="field">
                        <label>Nama Kegiatan Seni *</label>
                        <input type="text"
                               name="nama_ekskul"
                               value="{{ old('nama_ekskul', $ekskul->nama_ekskul) }}"
                               required>
                    </div>

                    <div class="field">
                        <label>Nama Pembina *</label>
                        <input type="text"
                               name="pembina"
                               value="{{ old('pembina', $ekskul->pembina) }}"
                               required>
                    </div>

                    <div class="field">
                        <label>Hari Latihan *</label>
                        <select name="hari" required>
                            @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                                <option value="{{ $hari }}"
                                    {{ old('hari', $ekskul->hari) == $hari ? 'selected' : '' }}>
                                    {{ $hari }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field">
                        <label>Lokasi Latihan *</label>
                        <input type="text"
                               name="lokasi"
                               value="{{ old('lokasi', $ekskul->lokasi) }}"
                               required>
                    </div>

                    <div class="field">
                        <label>Jam Mulai *</label>
                        <input type="time"
                               name="jam_mulai"
                               value="{{ old('jam_mulai', $ekskul->jam_mulai) }}"
                               required>
                    </div>

                    <div class="field">
                        <label>Jam Selesai *</label>
                        <input type="time"
                               name="jam_selesai"
                               value="{{ old('jam_selesai', $ekskul->jam_selesai) }}"
                               required>
                    </div>

                    <div class="field full">
                        <label>Foto Kegiatan Seni</label>

                        @if ($ekskul->foto)
                            <img src="{{ Storage::disk('public')->url($ekskul->foto) }}"
                                 alt="Foto {{ $ekskul->nama_ekskul }}"
                                 class="photo-preview">

                            <p class="help">
                                Foto saat ini. Pilih foto baru jika ingin menggantinya.
                            </p>
                        @else
                            <p class="help">
                                Belum ada foto. Silakan pilih foto kegiatan seni.
                            </p>
                        @endif

                        <input type="file"
                               name="foto"
                               accept="image/jpeg,image/png,image/webp">

                        <p class="help">
                            Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                            Kosongkan jika tidak ingin mengganti foto.
                        </p>
                    </div>

                    <div class="field full">
                        <label>Deskripsi dan Manfaat Kegiatan</label>
                        <textarea name="deskripsi">{{ old('deskripsi', $ekskul->deskripsi) }}</textarea>
                    </div>

                </div>

                <div class="actions">
                    <button type="submit" class="btn">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('ekskul.index') }}"
                       class="btn btn-cancel">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </section>
</main>

</body>
</html>