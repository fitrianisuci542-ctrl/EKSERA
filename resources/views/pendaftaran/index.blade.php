<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Ekstrakurikuler - EKSERA</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f1f5f9;
            color: #263445;
            padding: 28px 30px;
        }

        .container {
            max-width: 1500px;
            margin: auto;
        }

        /* HEADER */
        .header {
            background: linear-gradient(120deg, #0f4c81, #287db5);
            color: white;
            padding: 24px 27px;
            border-radius: 13px;
            margin-bottom: 22px;
        }

        .brand {
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 1.5px;
            margin-bottom: 10px;
            color: #d9efff;
        }

        h1 {
            font-size: 23px;
            margin-bottom: 9px;
        }

        .welcome {
            font-size: 12px;
            line-height: 1.7;
            color: #e6f3ff;
        }

        /* BAGIAN JUDUL */
        .top-action {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 18px;
        }

        .top-action h2 {
            color: #173d61;
            font-size: 18px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #145985;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
            transition: .2s;
        }

        .btn:hover {
            background: #2786c4;
        }

        /* NOTIFIKASI */
        .success {
            background: #dcfce7;
            color: #166534;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 12px;
            line-height: 1.6;
        }

        /* GRID KARTU */
        .ekskul-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            align-items: stretch;
        }

        .card {
            background: white;
            border-radius: 13px;
            box-shadow: 0 3px 12px #0000000d;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        /* FOTO EKSTRAKURIKULER */
        .photo-wrapper {
            width: 100%;
            height: 190px;
            padding: 0 20px;
            margin-top: 20px;
            overflow: hidden;
        }

        .ekskul-photo {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            object-position: center;
            border-radius: 9px;
            background: #e5eff7;
        }

        .photo-placeholder {
            width: 100%;
            height: 100%;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #dceefa, #a9d7f1);
            font-size: 50px;
        }

        /* ISI KARTU */
        .card-content {
            padding: 17px 20px 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .card h2 {
            color: #14527f;
            font-size: 19px;
            margin-bottom: 14px;
        }

        .detail {
            margin-bottom: 12px;
        }

        .detail p {
            font-size: 12px;
            margin: 8px 0;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .detail b {
            color: #173d61;
        }

        .description {
            font-size: 12px;
            color: #64748b;
            line-height: 1.7;
            margin: 5px 0 14px;
        }

        /* FORM */
        form {
            margin-top: auto;
        }

        label {
            display: block;
            margin: 10px 0 7px;
            font-size: 11px;
            font-weight: bold;
            color: #34536e;
        }

        textarea {
            width: 100%;
            min-height: 65px;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 12px;
            resize: vertical;
        }

        textarea:focus {
            outline: none;
            border-color: #14527f;
            box-shadow: 0 0 0 2px #14527f18;
        }

        .card button {
            width: 100%;
            margin-top: 12px;
            padding: 11px;
        }

        /* DATA KOSONG */
        .empty {
            text-align: center;
            padding: 35px 20px;
            background: white;
            border-radius: 12px;
            margin-top: 18px;
            font-size: 12px;
        }

        .empty h2 {
            color: #14527f;
            font-size: 18px;
            margin-bottom: 9px;
        }

        /* FOOTER */
        .footer {
            text-align: center;
            color: #91a0af;
            font-size: 11px;
            padding: 24px;
            line-height: 1.7;
            margin-top: 22px;
        }

        /* TABLET */
        @media (max-width: 1000px) {
            .ekskul-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        /* HP */
        @media (max-width: 650px) {
            body {
                padding: 15px;
            }

            .ekskul-grid {
                grid-template-columns: 1fr;
                gap: 17px;
            }

            .header {
                padding: 20px;
            }

            h1 {
                font-size: 20px;
            }

            .photo-wrapper {
                height: 210px;
            }

            .card-content {
                padding: 16px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <section class="header">
        <div class="brand">EKSERA.</div>

        <h1>Pendaftaran Ekstrakurikuler 🎭</h1>

        <p class="welcome">
            Halo, Selamat Datang, Siswa! 👋
            <br>
            Selamat datang di EKSERA – Sistem Informasi
            Ekstrakurikuler Seni dan Budaya.
            Pilih kegiatan yang sesuai dengan minat dan bakatmu.
        </p>
    </section>

    <div class="top-action">
        <h2>Daftar Kegiatan Ekstrakurikuler</h2>

        <a href="{{ route('pendaftaran.saya') }}" class="btn">
            📝 Pendaftaran Saya
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

    @if($errors->any())
        <div class="error">
            <strong>Periksa kembali formulir:</strong>

            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @forelse($ekskuls as $ekskul)

        @if($loop->first)
            <div class="ekskul-grid">
        @endif

        <div class="card">

            <div class="photo-wrapper">

                @if($ekskul->foto)

                    <img
                        src="{{ Storage::disk('public')->url($ekskul->foto) }}"
                        alt="{{ $ekskul->nama_ekskul }}"
                        class="ekskul-photo"
                    >

                @else

                    <div class="photo-placeholder">
                        @if(stripos($ekskul->nama_ekskul, 'tari') !== false)
                            💃
                        @elseif(stripos($ekskul->nama_ekskul, 'silat') !== false)
                            🥋
                        @elseif(stripos($ekskul->nama_ekskul, 'karawitan') !== false)
                            🎼
                        @else
                            🎭
                        @endif
                    </div>

                @endif

            </div>

            <div class="card-content">

                <h2>{{ $ekskul->nama_ekskul }}</h2>

                <div class="detail">

                    <p>
                        👨‍🏫 <b>Pembina:</b>
                        {{ $ekskul->pembina }}
                    </p>

                    <p>
                        📅 <b>Hari:</b>
                        {{ $ekskul->hari }}
                    </p>

                    <p>
                        🕒 <b>Jam:</b>
                        {{ $ekskul->jam_mulai }}
                        - {{ $ekskul->jam_selesai }}
                    </p>

                    <p>
                        📍 <b>Lokasi:</b>
                        {{ $ekskul->lokasi }}
                    </p>

                </div>

                <p class="description">
                    {{ $ekskul->deskripsi ?? 'Belum ada deskripsi kegiatan.' }}
                </p>

                <form
                    action="{{ route('pendaftaran.store', ['ekskul' => $ekskul->id]) }}"
                    method="POST"
                >
                    @csrf

                    <label>Catatan (opsional)</label>

                    <textarea
                        name="catatan"
                        placeholder="Tuliskan catatan jika ada..."
                    >{{ old('catatan') }}</textarea>

                    <button type="submit" class="btn">
                        Daftar Sekarang
                    </button>

                </form>

            </div>

        </div>

        @if($loop->last)
            </div>
        @endif

    @empty

        <div class="empty">
            <h2>Belum Ada Ekstrakurikuler</h2>
            <p>Belum ada kegiatan ekstrakurikuler yang tersedia.</p>
        </div>

    @endforelse

    <footer class="footer">
        <b>EKSERA © 2026</b>
        <br>
        Sistem Informasi Ekstrakurikuler Seni dan Budaya
    </footer>

</div>

</body>
</html>