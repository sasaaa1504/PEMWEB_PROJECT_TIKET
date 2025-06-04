@extends('layouts.app')

@section('title', 'Daftar Event Saya')

@section('content')
<div class="container">
    <h1>Daftar Event Saya</h1>
    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Buat Event Baru</a>

    @if($events->isEmpty())
        <p>Belum ada event yang dibuat.</p>
    @else
        <ul class="list-group">
            @foreach($events as $event)
                <li class="list-group-item">
                    <a href="{{ route('events.show', $event->id) }}">{{ $event->name }}</a>
                    <span class="float-end">
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus event ini?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
</form>
                    </span>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
