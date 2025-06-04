@extends('layouts.app')

@section('title', $event->name)

@section('content')
<div class="container mt-4">
    <h1>{{ $event->name }}</h1>

    @if ($event->image)
        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->name }}" class="img-fluid mb-3" style="max-height:400px; object-fit:cover;">
    @endif

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</li>
        <li class="list-group-item"><strong>Lokasi:</strong> {{ $event->venue ?? '-' }}</li>
        <li class="list-group-item"><strong>Harga:</strong> Rp {{ number_format($event->price, 0, ',', '.') }}</li>
        <li class="list-group-item"><strong>Deskripsi:</strong><br>{!! nl2br(e($event->description)) !!}</li>
    </ul>

    <a href="{{ route('events.index') }}" class="btn btn-secondary">Kembali ke Daftar Event</a>

    @if(Auth::check() && Auth::id() == $event->user_id)
        <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus event ini?');" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus Event</button>
        </form>
    @endif

</div>
@endsection
