@extends('layouts.app')
@section('title', 'Jelajah Event')
@section('content')
<div class="container py-4">
    <div class="row">
        {{-- Sidebar Filter --}}
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Filter</h5>
                    <form method="GET" action="{{ route('jelajah') }}">
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ request('lokasi') }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ request('tanggal') }}">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Maks</label>
                            <input type="number" name="harga" id="harga" class="form-control" value="{{ request('harga') }}">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Terapkan</button>
                            <a href="{{ route('jelajah') }}" class="btn btn-outline-secondary">Reset</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Daftar Event --}}
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Daftar Event</h4>
                <form method="GET" class="d-flex align-items-center">
                    <label class="me-2">Urutkan:</label>
                    <select name="sort" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Pilih --</option>
                        <option value="termurah" {{ request('sort') == 'termurah' ? 'selected' : '' }}>Harga Termurah</option>
                        <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Tanggal Terbaru</option>
                    </select>
                </form>
            </div>

            <div class="row">
                @forelse($events as $event)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" alt="{{ $event->name }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $event->name }}</h5>
                                <p class="text-muted mb-1">{{ $event->venue }}</p>
                                <p class="mb-1"><i class="bi bi-calendar"></i> {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</p>
                                <p class="fw-bold mb-2">Rp{{ number_format($event->price, 0, ',', '.') }}</p>
                                <a href="{{ route('events.show', $event) }}" class="btn btn-sm btn-primary mt-auto">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Tidak ada event ditemukan.</p>
                @endforelse

                <div class="d-flex justify-content-center mt-4">
                {{ $events->links() }}
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
