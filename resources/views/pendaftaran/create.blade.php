<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Ekstrakurikuler - Smart School</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #243b53;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #203f88;
            color: white;
            padding-top: 25px;
        }

        .logo {
            padding: 10px 25px 45px;
        }

        .logo h2 {
            font-size: 25px;
        }

        .logo p {
            margin-top: 8px;
            color: #d5e3ff;
            font-size: 14px;
        }

        .menu-title {
            padding: 20px 30px;
            font-size: 13px;
            color: #c8d9ff;
        }

        .menu a {
            display: block;
            padding: 18px 30px;
            color: white;
            text-decoration: none;
            margin: 5px 15px;
            border-radius: 12px;
        }

        .menu a:hover,
        .menu a.active {
            background: #2864e8;
        }

        .main {
            margin-left: 250px;
            padding: 35px;
        }

        .breadcrumb {
            margin-bottom: 30px;
            color: #64748b;
        }

        .breadcrumb a {
            color: #2563eb;
            text-decoration: none;
        }

        .heading h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .heading p {
            color: #64748b;
            margin-bottom: 35px;
        }

        .card {
            background: white;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
        }

        .card-header {
            padding: 28px 35px;
            border-bottom: 1px solid #e2e8f0;
        }

        .card-header h2 {
            font-size: 23px;
            margin-bottom: 8px;
        }

        .card-header p {
            color: #64748b;
        }

        .form-body {
            padding: 35px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px 30px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .full {
            grid-column: 1 / -1;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
        }

        label span {
            color: red;
        }

        input, select, textarea {
            width: 100%;
            padding: 15px;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            font-size: 16px;
            font-family: Arial, sans-serif;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #2563eb;
        }

        textarea {
            resize: vertical;
        }

        .info {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e40af;
            padding: 16px;
            border-radius: 10px;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            padding: 14px 23px;
            border-radius: 10px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }

        .btn-submit {
            background: #2563eb;
            color: white;
        }

        .btn-cancel {
            background: #e2e8f0;
            color: #334155;
        }

        .error {
            color: #dc2626;
            margin-bottom: 20px;
        }

        .success {
            color: #166534;
            background: #dcfce7;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        @media(max-width: 768px) {
            .sidebar {
                width: 180px;
            }

            .main {
                margin-left: 180px;
                padding: 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }

            .form-body {
                padding: 22px;
            }
        }

        @media(max-width: 480px) {
            .sidebar {
                width: 135px;
            }

            .logo h2 {
                font-size: 17px;
            }

            .logo p, .menu a, .menu-title {
                font-size: 12px;
            }

            .menu a {
                padding: 14px 10px;
                margin: 5px;
            }

            .main {
                margin-left: 135px;
                padding: 12px;
            }

            .heading h1 {
                font-size: 22px;
            }

            .card-header, .form-body {
                padding: 18px;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <div class="logo">
        <h2>Smart School</h2>
        <p>Sistem Informasi Sekolah</p>
    </div>

    <div class="menu-title">MENU UTAMA</div>

    <nav class="menu">
        <a href="{{ url('/dashboard') }}">⌂ Dashboard</a>
        <a href="{{ route('ekskul.index') }}">★ Ekstrakurikuler</a>
        <a href="{{ route('siswa.index') }}">♟ Data Siswa</a>
        <a href="{{ route('pendaftaran.create') }}" class="active">▣ Pendaftaran</a>
    </nav>
</aside>

<main class="main">

    <div class="breadcrumb">
        Dashboard / <a href="{{ route('pendaftaran.create') }}">Pendaftaran</a> / Formulir
    </div>

    <div class="heading">
        <h1>Pendaftaran Ekstrakurikuler</h1>
        <p>Daftarkan dirimu pada kegiatan ekstrakurikuler yang kamu minati.</p>
    </div>

    <div class="card">

        <div class="card-header">
            <h2>Formulir Pendaftaran</h2>
            <p>Lengkapi informasi pendaftaran dengan benar.</p>
        </div>

        <div class="form-body">

            @if(session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="info">
                ℹ️ Pilih ekstrakurikuler yang ingin kamu ikuti.
                Pastikan pilihanmu sudah benar sebelum mengirim pendaftaran.
            </div>

            <form action="{{ route('pendaftaran.store') }}" method="POST">
                @csrf

                <div class="form-grid">

                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text"
                               value="{{ auth()->user()->name }}"
                               readonly>
                    </div>

                    <div class="form-group">
                        <label>Email Siswa</label>
                        <input type="email"
                               value="{{ auth()->user()->email }}"
                               readonly>
                    </div>

                    <div class="form-group full">
                        <label>Nama Ekstrakurikuler <span>*</span></label>

                        <select name="ekskul_id" required>
                            <option value="">-- Pilih Ekstrakurikuler --</option>

                            @foreach($ekskuls as $ekskul)
                                <option value="{{ $ekskul->id }}"
                                    {{ old('ekskul_id') == $ekskul->id ? 'selected' : '' }}>
                                    {{ $ekskul->nama_ekskul }}
                                    - {{ $ekskul->hari }}
                                    ({{ $ekskul->jam_mulai }} - {{ $ekskul->jam_selesai }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group full">
                        <label>Alasan Mengikuti Ekstrakurikuler <span>*</span></label>
                        <textarea name="catatan"
                                  rows="4"
                                  placeholder="Tuliskan alasan kamu ingin mengikuti ekstrakurikuler ini..."
                                  required>{{ old('alasan') }}</textarea>
                    </div>

                </div>

                <div class="actions">
                    <a href="{{ url('/dashboard') }}" class="btn btn-cancel">
                        Batal
                    </a>

                    <button type="submit" class="btn btn-submit">
                        Kirim Pendaftaran
                    </button>
                </div>

            </form>

        </div>
    </div>

</main>

</body>
</html>