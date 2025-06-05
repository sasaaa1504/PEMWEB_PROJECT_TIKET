@extends('layouts.app')

@section('title', 'Buat Event Baru')

@section('content')
<div class="container mt-4">
    <h1>Buat Event Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Event</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="event_date" class="form-label">Tanggal Event</label>
            <input type="date" name="event_date" id="event_date" class="form-control" value="{{ old('event_date') }}" required>
        </div>

        <div class="mb-3">
            <label for="venue" class="form-label">Lokasi (Venue)</label>
            <input type="text" name="venue" id="venue" class="form-control" value="{{ old('venue') }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', 0) }}" min="0" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description') }}</textarea required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar Event (Opsional)</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Event</button>
    </form>
</div>
@endsection
