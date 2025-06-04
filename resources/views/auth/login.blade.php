@extends('layouts.app')

@section('title', 'Login EO')

@section('content')
<div class="container mt-4" style="max-width: 400px;">
    <h2>Login EO</h2>

@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('login.submit') }}" autocomplete="off" novalidate>
    @csrf
    <div class="mb-3">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" autocomplete="off" class="form-control" value="{{ old('email') }}" required autofocus>
    </div>

    <div class="mb-3">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" autocomplete="new-password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
</form>
<!-- resources/views/auth/login.blade.php -->
<p class="mt-3 text-center">
    Belum punya akun? 
    <a href="{{ route('register-eo.form') }}">Daftar di sini</a>
</p>

<script>
    window.onload = function() {
        document.querySelector('form').reset();
    }
</script>
</div>
@endsection
