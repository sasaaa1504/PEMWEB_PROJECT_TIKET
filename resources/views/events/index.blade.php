@extends('layouts.app')
@section('title', 'Daftar Event')
@section('content')
<div class="container py-4">
    <h2>Daftar Semua Event</h2>
    <div class="row">
        @foreach($events as $event)
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="{{ asset('storage/' . $event->thumbnail) }}" class="card-img-top" alt="{{ $event->nama_event }}">
                    <div class="card-body">
                        <h5>{{ $event->nama_event }}</h5>
                        <p>{{ $event->lokasi }} - {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</p>
                        <a href="{{ route('events.show', $event) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
