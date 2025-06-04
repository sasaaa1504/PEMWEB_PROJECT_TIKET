@extends('layouts.app')
@section('title', 'Dashboard EO')
@section('content')
<div class="container py-4">
    <h2 class="mb-4">Dashboard EO</h2>
    <p>Selamat datang, {{ auth()->user()->name }}!</p>
    
    <!-- Tombol Logout -->
    <form action="{{ route('logout') }}" method="POST" class="mb-3">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
    
    <a href="{{ route('events.create') }}" class="btn btn-success mb-3">+ Buat Event Baru</a>
    
    @if($events->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('events.show', $event) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('events.edit', $event) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus event?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada event.</p>
    @endif
</div>
@endsection
