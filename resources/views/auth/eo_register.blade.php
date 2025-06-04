<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gabung Jadi EO - HitTix</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #111;
            color: #fff;
            padding: 40px 20px;
        }
        .container {
            max-width: 400px;
            margin: auto;
            background: #222;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px #ff007f;
        }
        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #ff007f;
        }
        label {
            display: block;
            margin-bottom: 5px;
            margin-top: 15px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 5px;
            font-size: 1em;
        }
        .btn-submit {
            background-color: #ff007f;
            border: none;
            padding: 12px;
            width: 100%;
            color: white;
            font-weight: bold;
            font-size: 1.1em;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        .btn-submit:hover {
            background-color: #e60073;
        }
        .error {
            color: #ff4d6d;
            font-size: 0.9em;
        }
        .success {
            color: #00ff94;
            text-align: center;
            margin-bottom: 15px;
        }
        a {
            color: #ff007f;
            text-decoration: none;
            display: block;
            margin-top: 15px;
            text-align: center;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Gabung Jadi EO</h1>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
    <div style="color: red; margin-bottom: 10px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('register-eo.submit') }}" method="POST">
    @csrf

    <label>Nama Lengkap</label>
    <input type="text" name="user_name" value="{{ old('user_name') }}" autocomplete="off">

    <label>Alamat Email</label>
    <input type="email" name="user_email" value="{{ old('user_email') }}" autocomplete="off">

    <label>Password</label>
    <input type="password" name="user_password" autocomplete="new-password">

    <label>Konfirmasi Password</label>
    <input type="password" name="user_password_confirmation" autocomplete="new-password">

    <button type="submit">Daftar Sekarang</button>

    <!-- resources/views/auth/register-eo.blade.php -->
<p class="mt-3 text-center">
    Sudah punya akun? 
    <a href="{{ route('login') }}">Login di sini</a>
</p>

</form>
    <a href="{{ route('home') }}">Kembali ke Home</a>
</div>

</body>
</html>
