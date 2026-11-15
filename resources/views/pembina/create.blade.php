<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Pembina - Smart School</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            padding: 25px;
        }

        .card {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
        }

        h2 {
            color: #0f4c81;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button, a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            border: 0;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background: #0f4c81;
            color: white;
        }

        a {
            background: #ddd;
            color: #222;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
<div class="card">

    <h2>Tambah Data Pembina</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <ul class="error">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('pembina.store') }}" method="POST">
        @csrf

        <label>Nama Pembina *</label>
        <input type="text" name="nama"
               value="{{ old('nama') }}" required>

        <label>Email *</label>
        <input type="email" name="email"
               value="{{ old('email') }}" required>

        <label>No. HP *</label>
        <input type="text" name="no_hp"
               value="{{ old('no_hp') }}" required>

        <label>Bidang Ekstrakurikuler *</label>
        <input type="text" name="bidang"
               value="{{ old('bidang') }}" required>

        <label>Alamat *</label>
        <textarea name="alamat" rows="3" required>{{ old('alamat') }}</textarea>

        <button type="submit">Simpan Data</button>
        <a href="{{ route('pembina.index') }}">Batal</a>
    </form>

</div>
</body>
</html>