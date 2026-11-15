<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Smart School</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #eef5ff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .card {
            width: 450px;
            max-width: 100%;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,.12);
        }

        h1 {
            text-align: center;
            color: #1565c0;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #64748b;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #334155;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
        }

        input:focus {
            border-color: #1976d2;
        }

        button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: #1976d2;
            color: white;
            font-weight: bold;
            cursor: pointer;
            font-size: 15px;
        }

        button:hover {
            background: #125ca5;
        }

        .login {
            text-align: center;
            margin-top: 20px;
            color: #64748b;
        }

        a {
            color: #1976d2;
            font-weight: bold;
            text-decoration: none;
        }

        .error-box {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .error-text {
            color: #dc2626;
            font-size: 12px;
            margin-top: 5px;
        }

        @media (max-width: 480px) {
            .card {
                padding: 28px 22px;
            }
        }
    </style>
</head>

<body>

<div class="card">

    <h1>Smart School</h1>

    <p class="subtitle">Daftar Akun Siswa Baru</p>

    @if ($errors->any())
        <div class="error-box">
            <strong>Pendaftaran gagal:</strong>
            <ul style="padding-left: 20px; margin-top: 8px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.process') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input
                type="text"
                name="name"
                placeholder="Masukkan nama lengkap"
                value="{{ old('name') }}"
                required
            >
        </div>

        <div class="form-group">
            <label>Email</label>
            <input
                type="email"
                name="email"
                placeholder="Masukkan email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <div class="form-group">
            <label>Password</label>
            <input
                type="password"
                name="password"
                placeholder="Minimal 8 karakter"
                required
            >
        </div>

        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input
                type="password"
                name="password_confirmation"
                placeholder="Ulangi password"
                required
            >
        </div>

        <button type="submit">Daftar Sekarang</button>
    </form>

    <div class="login">
        Sudah punya akun?
        <a href="{{ route('login') }}">Login</a>
    </div>

</div>

</body>
</html>