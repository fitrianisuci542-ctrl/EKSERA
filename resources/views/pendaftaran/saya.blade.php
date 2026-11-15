<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Saya - EKSERA</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f7fb;
            color: #263445;
            padding: 28px 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .header {
            background: linear-gradient(110deg, #14527f, #2786c4);
            color: white;
            padding: 25px 28px;
            border-radius: 13px;
            margin-bottom: 22px;
            box-shadow: 0 4px 12px #14527f20;
        }

        .brand {
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 2px;
            color: #d9efff;
            margin-bottom: 10px;
        }

        .header h1 {
            font-size: 23px;
            margin-bottom: 9px;
        }

        .header p {
            line-height: 1.7;
            color: #e6f3ff;
            font-size: 12px;
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
            gap: 12px;
            flex-wrap: wrap;
        }

        .toolbar-title {
            font-size: 14px;
            font-weight: bold;
            color: #14527f;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #14527f;
            color: white;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 11px;
            transition: .2s;
        }

        .btn:hover {
            background: #2786c4;
        }

        .success, .error {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 17px;
            font-size: 12px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 13px;
            box-shadow: 0 3px 12px #0000000d;
            overflow: hidden;
            border: 1px solid #e7eef5;
            transition: .2s;
            min-width: 0;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 18px #14527f16;
        }

        /* FOTO EKSTRAKURIKULER */
        .photo-wrapper {
            width: 100%;
            height: 220px;
            padding: 14px 14px 0;
            overflow: hidden;
            background: white;
        }

        .ekskul-photo {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            object-position: center;
            border-radius: 10px;
            background: #f5faff;
        }

        .photo-placeholder {
            height: 206px;
            margin: 14px 14px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #dceefa, #a9d7f1);
            border-radius: 10px;
            font-size: 45px;
        }

        .card-content {
            padding: 17px;
        }

        .card h2 {
            color: #14527f;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .detail {
            background: #f5faff;
            padding: 13px 15px;
            border-radius: 9px;
        }

        .detail p {
            margin: 8px 0;
            line-height: 1.5;
            font-size: 12px;
            color: #475569;
        }

        .detail b {
            color: #14527f;
        }

        .description {
            margin: 14px 0;
            line-height: 1.7;
            color: #64748b;
            font-size: 12px;
        }

        .catatan {
            font-size: 12px;
            margin-top: 12px;
            line-height: 1.6;
            color: #64748b;
        }

        .catatan b {
            color: #14527f;
        }

        .status-area {
            margin-top: 15px;
            padding-top: 14px;
            border-top: 1px solid #edf1f5;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            font-size: 12px;
        }

        .status-area b {
            color: #14527f;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
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

        .status-lain {
            background: #e2e8f0;
            color: #475569;
        }

        .btn-hapus {
            margin-top: 15px;
            padding: 10px 15px;
            background: #dc2626;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 11px;
            transition: .2s;
        }

        .btn-hapus:hover {
            background: #b91c1c;
        }

        .empty {
            text-align: center;
            padding: 45px 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 3px 12px #0000000d;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 13px;
        }

        .empty h2 {
            color: #14527f;
            margin-bottom: 10px;
            font-size: 19px;
        }

        .empty p {
            color: #64748b;
            margin-bottom: 18px;
            font-size: 12px;
            line-height: 1.7;
        }

        .footer {
            text-align: center;
            color: #91a0af;
            font-size: 10px;
            padding: 25px 10px 10px;
            line-height: 1.8;
        }

        @media(max-width: 700px) {
            body {
                padding: 15px;
            }

            .header {
                padding: 20px;
            }

            .header h1 {
                font-size: 20px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .photo-wrapper {
                height: 210px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <section class="header">
        <div class="brand">EKSERA.</div>

        <h1>Pendaftaran Saya 📝</h1>

        <p>
            Hai, Selamat Datang, Siswa! 👋
            <br>
            Yuk, cek kegiatan ekstrakurikuler yang sudah kamu pilih
            dan lihat perkembangan status pendaftaranmu di sini.
        </p>
    </section>

    <div class="toolbar">
        <div class="toolbar-title">
            📋 Daftar Ekstrakurikuler Pilihanmu
        </div>

        <a href="{{ route('pendaftaran.index') }}" class="btn">
            ← Kembali ke Daftar Ekskul
        </a>
    </div>

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

    @php
        $pendaftaranValid = $pendaftarans->filter(function ($item) {
            return $item->ekskul !== null;
        });
    @endphp

    @if($pendaftaranValid->isEmpty())

        <div class="empty">
            <div class="empty-icon">🎭</div>

            <h2>Belum Ada Pendaftaran</h2>

            <p>
                Kamu belum memiliki pendaftaran ekstrakurikuler yang tersedia.
                Yuk, pilih kegiatan yang sesuai dengan minat dan bakatmu!
            </p>

            <a href="{{ route('pendaftaran.index') }}" class="btn">
                Lihat Ekstrakurikuler
            </a>
        </div>

    @else

        <div class="cards">

            @foreach($pendaftaranValid as $pendaftaran)

                @php
                    $status = strtolower($pendaftaran->status);
                @endphp

                <div class="card">

                    @if($pendaftaran->ekskul->foto)
                        <div class="photo-wrapper">
                            <img
                                src="{{ asset('storage/' . $pendaftaran->ekskul->foto) }}"
                                alt="{{ $pendaftaran->ekskul->nama_ekskul }}"
                                class="ekskul-photo"
                            >
                        </div>
                    @else
                        <div class="photo-placeholder">
                            🎭
                        </div>
                    @endif

                    <div class="card-content">

                        <h2>
                            {{ $pendaftaran->ekskul->nama_ekskul }}
                        </h2>

                        <div class="detail">
                            <p>
                                👨‍🏫 <b>Pembina:</b>
                                {{ $pendaftaran->ekskul->pembina ?? '-' }}
                            </p>

                            <p>
                                📅 <b>Hari:</b>
                                {{ $pendaftaran->ekskul->hari ?? '-' }}
                            </p>

                            <p>
                                🕒 <b>Jam:</b>
                                {{ $pendaftaran->ekskul->jam_mulai ?? '-' }}
                                -
                                {{ $pendaftaran->ekskul->jam_selesai ?? '-' }}
                            </p>

                            <p>
                                📍 <b>Lokasi:</b>
                                {{ $pendaftaran->ekskul->lokasi ?? '-' }}
                            </p>
                        </div>

                        <p class="description">
                            {{ $pendaftaran->ekskul->deskripsi ?: 'Belum ada deskripsi kegiatan.' }}
                        </p>

                        <p class="catatan">
                            <b>Catatan Pendaftaran:</b>
                            {{ $pendaftaran->catatan ?: '-' }}
                        </p>

                        <div class="status-area">
                            <b>Status Pendaftaran:</b>

                            <span class="status
                                {{ $status === 'menunggu' ? 'menunggu' : '' }}
                                {{ $status === 'diterima' ? 'diterima' : '' }}
                                {{ $status === 'ditolak' ? 'ditolak' : '' }}
                                {{ !in_array($status, ['menunggu', 'diterima', 'ditolak']) ? 'status-lain' : '' }}">
                                {{ ucfirst($pendaftaran->status) }}
                            </span>
                        </div>

                        <form
                            action="{{ url('/pendaftaran/' . $pendaftaran->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin membatalkan pendaftaran ini?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn-hapus">
                                Batalkan Pendaftaran
                            </button>
                        </form>

                    </div>
                </div>

            @endforeach

        </div>

    @endif

    <footer class="footer">
        EKSERA © 2026
        <br>
        Sistem Informasi Ekstrakurikuler Seni dan Budaya
    </footer>

</div>

</body>
</html>