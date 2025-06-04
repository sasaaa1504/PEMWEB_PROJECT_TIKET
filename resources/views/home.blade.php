@extends('layouts.app')

@section('title', 'HitTix - Landing Page')

@section('content')
<section class="banner text-center text-white py-5" style="background: linear-gradient(135deg, #ff4081, #f50057);">
    <div class="container">
        <h1 class="display-4 fw-bold">Selamat Datang di HitTix!</h1>
        <p class="lead mb-4">Platform mudah untuk jelajahi dan beli tiket event terbaik.</p>
        <a href="{{ url('/jelajah') }}" class="btn btn-light btn-lg text-danger fw-bold">Jelajah Event</a>
    </div>
</section>

<section class="py-5 bg-dark text-light">
    <div class="container">
        <h2 class="text-center text-pink mb-4">Event Hype & Segera Tayang</h2>
        <div class="row">
            @forelse($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card bg-black border-pink shadow-sm h-100">
                        <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" alt="{{ $event->name }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-pink">{{ $event->name }}</h5>
                            <p class="card-text"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</p>
                            <p class="card-text"><strong>Lokasi:</strong> {{ $event->venue }}</p>
                            <a href="{{ url('/event/' . $event->id) }}" class="btn btn-outline-pink mt-2">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-light">Belum ada event tersedia.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
