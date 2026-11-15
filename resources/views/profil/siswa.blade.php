<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya | EKSERA</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f1f6fb;
            color: #24364b;
        }

        .sidebar {
            width: 230px;
            height: 100vh;
            background: #0f3d65;
            position: fixed;
            top: 0;
            left: 0;
            padding: 25px 17px;
            color: white;
        }

        .brand {
            font-size: 23px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 5px;
        }

        .brand-desc {
            font-size: 11px;
            text-align: center;
            color: #c5e5ff;
            margin-bottom: 35px;
        }

        .menu-title {
            font-size: 11px;
            color: #9fc8e8;
            margin: 20px 10px 10px;
            text-transform: uppercase;
        }

        .menu a {
            display: block;
            text-decoration: none;
            color: #e8f4ff;
            padding: 12px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 7px;
            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: #2786c4;
            color: white;
        }

        .main {
            margin-left: 230px;
            padding: 25px 30px;
        }

        .navbar {
            background: white;
            padding: 14px 20px;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
            margin-bottom: 25px;
        }

        .navbar strong {
            color: #14527f;
            font-size: 15px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
        }

        .small-photo {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
            background: #dceeff;
        }

        .page-title {
            margin-bottom: 6px;
            color: #123b5d;
            font-size: 23px;
        }

        .subtitle {
            color: #718096;
            font-size: 13px;
            margin-bottom: 22px;
        }

        .profile-card {
            background: white;
            border-radius: 14px;
            padding: 25px;
            max-width: 850px;
            box-shadow: 0 4px 15px rgba(0,0,0,.04);
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 22px;
            padding-bottom: 22px;
            border-bottom: 1px solid #e7edf3;
            margin-bottom: 22px;
        }

        .profile-photo {
            width: 105px;
            height: 105px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #e0f1ff;
            background: #eaf5ff;
        }

        .photo-placeholder {
            width: 105px;
            height: 105px;
            border-radius: 50%;
            background: #e0f1ff;
            color: #2786c4;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 42px;
            border: 4px solid #e0f1ff;
        }

        .profile-header h3 {
            color: #14527f;
            margin-bottom: 6px;
            font-size: 18px;
        }

        .profile-header p {
            color: #718096;
            font-size: 13px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-group {
            margin-bottom: 5px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #344b60;
        }

        .form-group input {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #d7e2ec;
            border-radius: 8px;
            outline: none;
            font-size: 13px;
            background: #fff;
        }

        .form-group input:focus {
            border-color: #2786c4;
            box-shadow: 0 0 0 3px rgba(39,134,196,.10);
        }

        .form-group input[type="file"] {
            background: #f8fbff;
        }

        .hint {
            color: #8493a3;
            font-size: 11px;
            margin-top: 7px;
        }

        .error {
            color: #dc3545;
            font-size: 12px;
            margin-top: 6px;
        }

        .success {
            background: #e2f7e9;
            color: #237a42;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 25px;
            gap: 10px;
        }

        .btn {
            border: none;
            padding: 11px 19px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-save {
            background: #14527f;
            color: white;
        }

        .btn-save:hover {
            background: #2786c4;
        }

        .btn-back {
            background: #eaf1f7;
            color: #34536e;
        }

        @media(max-width: 750px) {
            .sidebar {
                width: 190px;
            }

            .main {
                margin-left: 190px;
                padding: 18px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width: 550px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
            }

            .profile-header {
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

@php
    $user = Auth::user();
@endphp

<aside class="sidebar">
    <div class="brand">EKSERA</div>
    <div class="brand-desc">Sistem Informasi Ekstrakurikuler Seni dan Budaya</div>

    <div class="menu-title">Menu Utama</div>

    <nav class="menu">
        <a href="{{ route('dashboard.siswa') }}">🏠 Dashboard</a>
        <a href="{{ route('pendaftaran.index') }}">🎨 Daftar Ekstrakurikuler</a>
        <a href="{{ route('pendaftaran.saya') }}">📝 Pendaftaran Saya</a>
        <a href="{{ route('jadwal.index') }}">📅 Jadwal Latihan</a>
        <a href="{{ route('event.index') }}">🎭 Informasi Event</a>
        <a href="{{ route('profil.siswa') }}" class="active">👤 Profil Saya</a>
    </nav>
</aside>

<main class="main">

    <div class="navbar">
        <strong>Profil Siswa</strong>

        <div class="user-info">
            @if($user->foto_profil)
                <img class="small-photo"
                     src="{{ asset('storage/' . $user->foto_profil) }}"
                     alt="Foto profil">
            @else
                <div class="photo-placeholder" style="width:35px;height:35px;font-size:17px;">
                    👤
                </div>
            @endif

            <span>{{ $user->name }} | Siswa</span>
        </div>
    </div>

    <h2 class="page-title">Profil Saya 👤</h2>
    <p class="subtitle">
        Kelola informasi pribadi dan foto profil akun EKSERA kamu.
    </p>

    <section class="profile-card">

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="success" style="background:#fff0f0;color:#b42318;">
                Periksa kembali data yang kamu masukkan.
            </div>
        @endif

        <div class="profile-header">
            @if($user->foto_profil)
                <img
                    src="{{ asset('storage/' . $user->foto_profil) }}"
                    class="profile-photo"
                    alt="Foto profil siswa">
            @else
                <div class="photo-placeholder">👤</div>
            @endif

            <div>
                <h3>{{ $user->name }}</h3>
                <p>{{ $user->email }}</p>
                <p style="margin-top:6px;">Akun Siswa EKSERA</p>
            </div>
        </div>

        <form action="{{ route('profil.siswa.update') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        required>
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                        required>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Foto Profil</label>
                    <input
                        type="file"
                        name="foto_profil"
                        accept=".jpg,.jpeg,.png,.webp,image/*">
                    <p class="hint">Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.</p>
                    @error('foto_profil')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="actions">
                <a href="{{ route('dashboard.siswa') }}" class="btn btn-back">
                    Kembali
                </a>

                <button type="submit" class="btn btn-save">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>

    </section>

</main>

</body>
</html>