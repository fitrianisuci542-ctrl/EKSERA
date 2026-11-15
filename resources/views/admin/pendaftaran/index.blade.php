<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pendaftaran - EKSERA</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f1f5f9;
            color: #334155;
            padding: 30px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .header {
            background: linear-gradient(110deg, #14527f, #2786c4);
            color: white;
            padding: 30px;
            border-radius: 16px;
            margin-bottom: 25px;
        }

        .brand {
            font-size: 14px;
            letter-spacing: 2px;
            font-weight: bold;
            color: #d9efff;
            margin-bottom: 12px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 12px;
        }

        .header p {
            line-height: 1.7;
            color: #e6f3ff;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            color: white;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
        }

        .btn-update {
            background: #14527f;
        }

        .btn-delete {
            background: #dc2626;
            margin-top: 7px;
        }

        .btn:hover {
            opacity: .85;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px;
            border-radius: 9px;
            margin: 20px 0;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 14px;
            border-radius: 9px;
            margin: 20px 0;
        }

        .table-wrapper {
            background: white;
            border-radius: 14px;
            padding: 22px;
            margin-top: 22px;
            overflow-x: auto;
            box-shadow: 0 3px 12px #0000000d;
        }

        .table-wrapper h2 {
            color: #14527f;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th, td {
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
            font-size: 13px;
            vertical-align: middle;
        }

        th {
            background: #f1f7fc;
            color: #14527f;
        }

        select {
            padding: 9px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            margin-bottom: 7px;
            width: 120px;
        }

        .status {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .menunggu {
            background: #fef3c7;
            color: #92400e;
        }

        .diterima {
            background: #dcfce7;
            color: #166534;
        }

        .ditolak {
            background: #fee2e2;
            color: #991b1b;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #64748b;
        }

        .footer {
            text-align: center;
            color: #91a0af;
            font-size: 12px;
            padding: 30px;
            line-height: 1.8;
        }

        @media(max-width: 600px) {
            body {
                padding: 15px;
            }

            .header {
                padding: 22px;
            }

            .header h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- HEADER -->
    <section class="header">
        <div class="brand">EKSERA.</div>

        <h1>Kelola Pendaftaran Siswa</h1>

        <p>
            Kelola data pendaftaran ekstrakurikuler
            Seni Tari, Pencak Silat, dan Karawitan.
        </p>
    </section>

    <!-- KEMBALI -->
    <a href="{{ route('dashboard.admin') }}"
       class="btn btn-update">
        ← Kembali ke Dashboard
    </a>

    <!-- NOTIFIKASI -->
    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <!-- TABEL PENDAFTARAN -->
    <div class="table-wrapper">

        <h2>Data Pendaftaran Ekstrakurikuler</h2>

        @forelse($pendaftarans as $index => $pendaftaran)

            @if($loop->first)
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Siswa</th>
                            <th>Email</th>
                            <th>Ekstrakurikuler</th>
                            <th>Catatan</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
            @endif

            <tr>
                <td>{{ $index + 1 }}</td>

                <td>
                    {{ $pendaftaran->user->name ?? '-' }}
                </td>

                <td>
                    {{ $pendaftaran->user->email ?? '-' }}
                </td>

                <td>
                    {{ $pendaftaran->ekskul->nama_ekskul ?? '-' }}
                </td>

                <td>
                    {{ $pendaftaran->catatan ?: '-' }}
                </td>

                <td>
                    @php
                        $status = strtolower($pendaftaran->status);
                    @endphp

                    <span class="status
                        {{ in_array($status, ['menunggu', 'diterima', 'ditolak']) ? $status : 'menunggu' }}">
                        {{ ucfirst($pendaftaran->status) }}
                    </span>
                </td>

                <td>
                    {{ $pendaftaran->created_at->format('d-m-Y') }}
                </td>

                <td>
                    <!-- UBAH STATUS -->
                    <form
                        action="{{ route('admin.pendaftaran.update', $pendaftaran->id) }}"
                        method="POST">

                        @csrf
                        @method('PUT')

                        <select name="status" required>
                            <option value="menunggu"
                                {{ $status == 'menunggu' ? 'selected' : '' }}>
                                Menunggu
                            </option>

                            <option value="diterima"
                                {{ $status == 'diterima' ? 'selected' : '' }}>
                                Diterima
                            </option>

                            <option value="ditolak"
                                {{ $status == 'ditolak' ? 'selected' : '' }}>
                                Ditolak
                            </option>
                        </select>

                        <button type="submit" class="btn btn-update">
                            Simpan
                        </button>
                    </form>

                    <!-- HAPUS PENDAFTARAN -->
                    <form
                        action="{{ route('admin.pendaftaran.destroy', $pendaftaran->id) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus pendaftaran ini?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-delete">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>

            @if($loop->last)
                    </tbody>
                </table>
            @endif

        @empty

            <div class="empty">
                <h3>Belum Ada Pendaftaran</h3>
                <p>Belum ada siswa yang mendaftar ekstrakurikuler.</p>
            </div>

        @endforelse

    </div>

    <footer class="footer">
        EKSERA © 2026
        <br>
        Sistem Informasi Ekstrakurikuler Seni dan Budaya
    </footer>

</div>

</body>
</html>