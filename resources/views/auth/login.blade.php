<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EKSERA</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #edf3f8;
            padding: 25px;
        }

        .login-container {
            width: 100%;
            max-width: 820px;
            min-height: 450px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(18, 62, 101, 0.13);
        }

        .brand-section {
            background: linear-gradient(145deg, #123e65, #2879b9);
            color: white;
            padding: 38px 32px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .logo-box {
            width: 105px;
            height: 105px;
            background: white;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            margin-bottom: 22px;
        }

        .brand-logo {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .brand-section h1 {
            font-size: 29px;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .brand-section h3 {
            font-size: 14px;
            font-weight: 500;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .brand-section p {
            font-size: 12px;
            line-height: 1.8;
            color: #e2edf7;
        }

        .login-section {
            padding: 45px 38px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-section h2 {
            color: #123e65;
            font-size: 25px;
            margin-bottom: 7px;
        }

        .subtitle {
            color: #7b8794;
            font-size: 13px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #34495e;
            margin-bottom: 7px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #d5e0e9;
            border-radius: 8px;
            outline: none;
            font-size: 13px;
            background: #fff;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #2879b9;
            box-shadow: 0 0 0 3px rgba(40, 121, 185, 0.1);
        }

        .login-button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #123e65;
            color: white;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 5px;
            transition: .2s;
        }

        .login-button:hover {
            background: #2879b9;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #687787;
        }

        .register-link a {
            color: #2879b9;
            font-weight: bold;
            text-decoration: none;
        }

        .alert {
            padding: 10px;
            border-radius: 7px;
            margin-bottom: 15px;
            font-size: 12px;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        @media(max-width: 650px) {
            body {
                padding: 15px;
            }

            .login-container {
                max-width: 400px;
                grid-template-columns: 1fr;
            }

            .brand-section {
                padding: 25px 20px;
            }

            .logo-box {
                width: 75px;
                height: 75px;
                margin-bottom: 12px;
            }

            .brand-section h1 {
                font-size: 23px;
            }

            .login-section {
                padding: 30px 25px;
            }
        }
    </style>
</head>

<body>

<div class="login-container">

    <div class="brand-section">

        <div class="logo-box">
            <img
                src="{{ asset('images/eksera-logo.jpeg') }}"
                alt="Logo EKSERA"
                class="brand-logo"
                onerror="this.style.display='none'; this.parentElement.innerHTML='<span style=\'color:#123e65;font-weight:bold;font-size:17px\'>EKSERA</span>';"
            >
        </div>

        <h1>EKSERA</h1>

        <h3>
            Sistem Informasi<br>
            Ekstrakurikuler Seni dan Budaya
        </h3>

        <p>
            Wadah pengelolaan kegiatan ekstrakurikuler
            untuk mendukung kreativitas, bakat,
            dan prestasi siswa.
        </p>

    </div>

    <div class="login-section">

        <h2>Selamat Datang!</h2>
        <p class="subtitle">Silakan masuk ke akun EKSERA Anda.</p>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="role">Login Sebagai</label>
                <select name="role" id="role" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="pembina" {{ old('role') == 'pembina' ? 'selected' : '' }}>Pembina</option>
                    <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Masukkan email"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Masukkan password"
                    required
                >
            </div>

            <button type="submit" class="login-button">
                LOGIN SEKARANG
            </button>
        </form>

        <div class="register-link">
            Belum memiliki akun?
            <a href="{{ route('register') }}">Daftar Sekarang</a>
        </div>

    </div>

</div>

</body>
</html>