```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa - Smart School</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6fb;
            color: #243247;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #0f4c81;
            color: white;
            padding: 28px 20px;
        }

        .sidebar h2 {
            color: #8fd3ff;
            margin-bottom: 35px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 13px;
            margin-bottom: 8px;
            border-radius: 8px;
        }

        .sidebar a:hover {
            background: #28689c;
        }

        .main {
            margin-left: 250px;
            padding: 30px;
        }

        .navbar {
            background: white;
            padding: 20px 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            font-size: 20px;
            font-weight: bold;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            max-width: 950px;
            box-shadow: 0 4px 15px #0000000a;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .full {
            grid-column: 1 / -1;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d5deea;
            border-radius: 8px;
            font-size: 14px;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        button, .cancel {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        button {
            background: #0f4c81;
            color: white;
        }

        .cancel {
            background: #e8edf4;
            color: #243247;
        }

        .error {
            color: #d62828;
            font-size: 13px;
        }

        .alert {
            background: #fff0f0;
            color: #c62828;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 18px;
        }

        @media (max-width: 750px) {
            .sidebar {
                width: 180px;
            }

            .main {
                margin-left: 180px;
                padding: 15px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>
    <aside class="sidebar">
        <h2>Smart School</h2>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('siswa.index') }}">Data Siswa</a>
        <a href="{{ route('ekskul.index') }}">Data Ekstrakurikuler</a>
    </aside>

    <main class="main">
        <div class="navbar">Edit Data Siswa</div>

        <div class="card">
            <h2>Form Edit Siswa</h2>
            <p>Ubah informasi siswa, lalu tekan Simpan Perubahan.</p>

            @if ($errors->any())
                <div class="alert">
                    <strong>Data belum berhasil disimpan:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input id="nis" type="text" name="nis"
                            value="{{ old('nis', $siswa->nis) }}" required>
                        @error('nis')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Siswa</label>
                        <input id="nama" type="text" name="nama"
                            value="{{ old('nama', $siswa->nama) }}" required>
                        @error('nama')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input id="kelas" type="text" name="kelas"
                            value="{{ old('kelas', $siswa->kelas) }}" required>
                        @error('kelas')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input id="jurusan" type="text" name="jurusan"
                            value="{{ old('jurusan', $siswa->jurusan) }}">
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki-laki"
                                {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>
                            <option value="Perempuan"
                                {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="no_hp">Nomor HP</label>
                        <input id="no_hp" type="text" name="no_hp"
                            value="{{ old('no_hp', $siswa->no_hp) }}">
                    </div>

                    <div class="form-group full">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat">{{ old('alamat', $siswa->alamat) }}</textarea>
                    </div>
                </div>

                <div class="actions">
                    <button type="submit">Simpan Perubahan</button>
                    <a class="cancel" href="{{ route('siswa.index') }}">Batal</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
```