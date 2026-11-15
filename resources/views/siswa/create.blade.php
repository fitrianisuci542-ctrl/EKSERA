<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 35px;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #17365d;
        }

        h1 {
            font-size: 28px;
            margin: 0 0 12px;
        }

        .subtitle {
            font-size: 16px;
            color: #64748b;
            margin-bottom: 38px;
        }

        .form-card {
            background: white;
            padding: 45px;
            border-radius: 24px;
            max-width: 1400px;
            margin: auto;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 12px;
            color: #172b4d;
        }

        input, select, textarea {
            width: 100%;
            padding: 18px 20px;
            border: 1px solid #cbd5e1;
            border-radius: 14px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            background: white;
            color: #334155;
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #14558a;
            box-shadow: 0 0 0 3px rgba(20, 85, 138, 0.1);
        }

        .error {
            color: #dc2626;
            font-size: 14px;
            margin-top: 7px;
        }

        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 35px;
        }

        .btn {
            padding: 18px 30px;
            border: none;
            border-radius: 14px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-cancel {
            background: #e5e7eb;
            color: #334155;
        }

        .btn-save {
            background: #14558a;
            color: white;
        }

        .btn-save:hover {
            background: #0f426d;
        }

        @media (max-width: 700px) {
            body {
                padding: 18px;
            }

            .form-card {
                padding: 22px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <h1>Tambah Siswa
    <div class="subtitle">Silakan isi data siswa dengan lengkap.</div>

    <div class="form-card">

        <form action="{{ route('siswa.store') }}" method="POST">
            @csrf

            <div class="form-grid">

                <div class="form-group">
                    <label for="nis">NIS *</label>
                    <input type="text" id="nis" name="nis"
                        value="{{ old('nis') }}"
                        placeholder="Masukkan NIS" required>
                    @error('nis')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama Lengkap *</label>
                    <input type="text" id="nama" name="nama"
                        value="{{ old('nama') }}"
                        placeholder="Masukkan nama siswa" required>
                    @error('nama')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas *</label>
                    <input type="text" id="kelas" name="kelas"
                        value="{{ old('kelas') }}"
                        placeholder="Contoh: XI RPL 1" required>
                    @error('kelas')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
<select name="jurusan" id="jurusan" required>
    <option value="">-- Pilih Jurusan --</option>
    <option value="RPL" {{ old('jurusan') == 'RPL' ? 'selected' : '' }}>RPL</option>
    <option value="DKV" {{ old('jurusan') == 'DKV' ? 'selected' : '' }}>DKV</option>
    <option value="BRP" {{ old('jurusan') == 'BRP' ? 'selected' : '' }}>BRP</option>
</select>
                    @error('jurusan')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin *</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki"
                            {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>
                        <option value="Perempuan"
                            {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_hp">Nomor HP</label>
                    <input type="text" id="no_hp" name="no_hp"
                        value="{{ old('no_hp') }}"
                        placeholder="Contoh: 08123456789">
                    @error('no_hp')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group full">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat"
                        placeholder="Masukkan alamat siswa">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="buttons">
                <a href="{{ route('siswa.index') }}" class="btn btn-cancel">
                    Batal
                </a>

                <button type="submit" class="btn btn-save">
                    ðŸ’¾ Simpan Data Siswa
                </button>
            </div>

        </form>
    </div>

</body>
</html>

