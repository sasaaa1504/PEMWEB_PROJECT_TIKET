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

{{-- Section Event Terdekat --}}
<div class="container py-4">
    <h2 class="mb-4">Konser Terdekat</h2>
    <div class="row">
        @forelse ($events as $event)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
<img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" alt="{{ $event->name }}">
                    <div class="card-body d-flex flex-column">
<h5 class="card-title">{{ $event->name }}</h5>                        <p class="mb-1 text-muted">{{ $event->venue }}</p>
                        <p class="mb-1"><i class="bi bi-calendar"></i> {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</p>
<p class="fw-bold mb-2">Rp{{ number_format($event->price, 0, ',', '.') }}</p>                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-sm btn-primary mt-auto">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <p>Tidak ada konser terdekat saat ini.</p>
        @endforelse
    </div>
</div>

@endsection
