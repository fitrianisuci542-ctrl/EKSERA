<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Event - EKSERA</title>

    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #0f4c81;
            color: white;
            padding: 28px 20px;
        }
        .logo {
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 40px;
        }
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 13px;
            border-radius: 8px;
            margin-bottom: 8px;
        }
        .sidebar a:hover, .active { background: #256da5; }
        .main {
            margin-left: 250px;
            padding: 30px;
        }
        .navbar {
            background: white;
            padding: 20px 25px;
            border-radius: 12px;
            margin-bottom: 25px;
        }
        .card {
            background: white;
            padding: 28px;
            border-radius: 14px;
            max-width: 950px;
        }
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        .full { grid-column: 1 / -1; }
        label {
            font-weight: bold;
            margin-bottom: 8px;
        }
        input, textarea, select {
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            width: 100%;
        }
        textarea {
            min-height: 110px;
            resize: vertical;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #0f4c81;
        }
        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }
        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }
        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            background: #0f4c81;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-back { background: #64748b; }

        @media(max-width: 700px) {
            .sidebar { width: 190px; }
            .main { margin-left: 190px; padding: 15px; }
            .form-grid { grid-template-columns: 1fr; }
            .full { grid-column: auto; }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo">EKSERA</div>
    <a href="{{ route('dashboard.admin') }}">Dashboard</a>
    <a href="{{ route('ekskul.index') }}">Data Ekstrakurikuler</a>
    <a href="{{ route('siswa.index') }}">Data Siswa</a>
    <a href="{{ route('pembina.index') }}">Data Pembina</a>
    <a href="{{ route('admin.pendaftaran.index') }}">Pendaftaran</a>
    <a href="{{ route('event.index') }}" class="active">Next Event</a>
</div>

<div class="main">

    <div class="navbar">
        <h2>Tambah Event EKSERA</h2>
    </div>

    <div class="card">

        <h2 style="margin-top:0;">Form Tambah Event</h2>
        <p style="color:#64748b;margin-bottom:25px;">
            Masukkan informasi kegiatan ekstrakurikuler.
        </p>

        <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-grid">

                <div class="form-group full">
                    <label>Nama Event</label>
                    <input type="text" name="nama_event"
                           value="{{ old('nama_event') }}"
                           placeholder="Contoh: Pentas Seni Budaya">
                    @error('nama_event')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tanggal Event</label>
                    <input type="date" name="tanggal"
                           value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi"
                           value="{{ old('lokasi') }}"
                           placeholder="Masukkan lokasi event">
                    @error('lokasi')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Jam Mulai</label>
                    <input type="time" name="jam_mulai"
                           value="{{ old('jam_mulai') }}">
                    @error('jam_mulai')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Jam Selesai</label>
                    <input type="time" name="jam_selesai"
                           value="{{ old('jam_selesai') }}">
                    @error('jam_selesai')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group full">
                    <label>Penyelenggara</label>
                    <input type="text" name="penyelenggara"
                           value="{{ old('penyelenggara') }}"
                           placeholder="Contoh: OSIS / Pembina EKSERA">
                    @error('penyelenggara')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group full">
                    <label>Deskripsi Event</label>
                    <textarea name="deskripsi"
                              placeholder="Jelaskan kegiatan event...">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group full">
                    <label>Foto Event</label>
                    <input type="file" name="foto" accept="image/*">
                    @error('foto')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="buttons">
                <button type="submit" class="btn">Simpan Event</button>
                <a href="{{ route('event.index') }}" class="btn btn-back">Kembali</a>
            </div>

        </form>
    </div>
</div>

</body>
</html>