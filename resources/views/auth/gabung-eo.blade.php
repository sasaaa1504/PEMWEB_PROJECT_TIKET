<!-- resources/views/auth/gabung-eo.blade.php -->
@extends('layouts.app')

@section('title', 'Gabung Jadi EO')

@section('content')
<div class="container text-center mt-5">
    <h2>Gabung jadi EO</h2>
    <p class="mb-4">Pilih salah satu opsi untuk melanjutkan:</p>

<a href="{{ route('login') }}" class="btn btn-outline-primary mb-3">
    Saya sudah punya akun (Login)
</a>
    <a href="{{ route('register-eo.form') }}" class="btn btn-primary">Daftar Sebagai EO Baru</a>
</div>
@endsection
