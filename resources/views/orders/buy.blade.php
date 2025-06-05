@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-lg p-6 bg-dark rounded shadow-lg text-light">
    <h1 class="text-3xl font-semibold mb-5 text-center">Form Pemesanan Tiket</h1>

    <form action="{{ route('order.store', $event->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf

        <fieldset class="mb-4">
            <legend class="h5 mb-3">Data Pemesan</legend>

            <div class="mb-3">
                <label for="nama_pemesan" class="form-label">Nama Lengkap Pemesan</label>
                <input type="text" id="nama_pemesan" name="nama_pemesan" required
                    class="form-control" placeholder="Nama Lengkap Pemesan">
                <div class="invalid-feedback">Nama pemesan wajib diisi.</div>
            </div>

            <div class="mb-3">
                <label for="email_pemesan" class="form-label">Email Pemesan</label>
                <input type="email" id="email_pemesan" name="email_pemesan" required
                    class="form-control" placeholder="Email Pemesan">
                <div class="invalid-feedback">Email pemesan wajib diisi dengan format benar.</div>
            </div>

            <div class="mb-3">
                <label for="jenis_identitas_pemesan" class="form-label">Jenis Identitas Pemesan</label>
                <select id="jenis_identitas_pemesan" name="jenis_identitas_pemesan" required class="form-select">
                    <option value="" disabled selected>Pilih Jenis Identitas</option>
                    <option value="KTP">KTP</option>
                    <option value="SIM">SIM</option>
                </select>
                <div class="invalid-feedback">Pilih jenis identitas pemesan.</div>
            </div>

            <div class="mb-3">
                <label for="nomor_identitas_pemesan" class="form-label">Nomor Identitas Pemesan</label>
                <input type="text" id="nomor_identitas_pemesan" name="nomor_identitas_pemesan" required
                    class="form-control" placeholder="Nomor Identitas Pemesan">
                <div class="invalid-feedback">Nomor identitas wajib diisi.</div>
            </div>

            <div class="mb-3">
                <label for="wa_pemesan" class="form-label">Nomor WhatsApp Pemesan</label>
                <input type="text" id="wa_pemesan" name="wa_pemesan" required
                    class="form-control" placeholder="Nomor WhatsApp Pemesan">
                <div class="invalid-feedback">Nomor WhatsApp wajib diisi.</div>
            </div>
        </fieldset>

        <fieldset class="mb-4">
            <legend class="h5 mb-3 d-flex align-items-center justify-content-between">
                Data Pemilik Tiket
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" type="checkbox" id="copyData">
                    <label class="form-check-label" for="copyData" style="font-weight: normal;">Samakan dengan pemesan</label>
                </div>
            </legend>

            <div class="mb-3">
                <label for="nama_pemilik" class="form-label">Nama Lengkap Pemilik Tiket</label>
                <input type="text" id="nama_pemilik" name="nama_pemilik" required
                    class="form-control" placeholder="Nama Lengkap Pemilik Tiket">
                <div class="invalid-feedback">Nama pemilik tiket wajib diisi.</div>
            </div>

            <div class="mb-3">
                <label for="jenis_identitas_pemilik" class="form-label">Jenis Identitas Pemilik Tiket</label>
                <select id="jenis_identitas_pemilik" name="jenis_identitas_pemilik" required class="form-select">
                    <option value="" disabled selected>Pilih Jenis Identitas</option>
                    <option value="KTP">KTP</option>
                    <option value="SIM">SIM</option>
                </select>
                <div class="invalid-feedback">Pilih jenis identitas pemilik tiket.</div>
            </div>

            <div class="mb-3">
                <label for="nomor_identitas_pemilik" class="form-label">Nomor Identitas Pemilik Tiket</label>
                <input type="text" id="nomor_identitas_pemilik" name="nomor_identitas_pemilik" required
                    class="form-control" placeholder="Nomor Identitas Pemilik Tiket">
                <div class="invalid-feedback">Nomor identitas wajib diisi.</div>
            </div>

            <div class="mb-3">
                <label for="wa_pemilik" class="form-label">Nomor WhatsApp Pemilik Tiket</label>
                <input type="text" id="wa_pemilik" name="wa_pemilik" required
                    class="form-control" placeholder="Nomor WhatsApp Pemilik Tiket">
                <div class="invalid-feedback">Nomor WhatsApp wajib diisi.</div>
            </div>
        </fieldset>

        <fieldset class="mb-4">
            <legend class="h5 mb-3">Detail Event & Tiket</legend>

            <div class="mb-3">
                <label for="tanggal_event" class="form-label">Tanggal Event</label>
                <input type="text" id="tanggal_event" value="{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}" readonly
                    class="form-control bg-secondary text-light" tabindex="-1">
            </div>

            <div class="mb-3">
                <label for="jenis_tiket" class="form-label">Jenis Tiket Terpilih</label>
                <input type="text" id="jenis_tiket" value="{{ $selectedTicket->nama ?? '-' }}" readonly
                    class="form-control bg-secondary text-light" tabindex="-1">
            </div>

            <div class="mb-3">
                <label for="harga_tiket" class="form-label">Harga Tiket</label>
                <input type="text" id="harga_tiket" value="{{ isset($selectedTicket) ? number_format($selectedTicket->harga, 0, ',', '.') : '-' }}" readonly
                    class="form-control bg-secondary text-light" tabindex="-1">
            </div>

            <div class="mb-3">
                <label class="form-label d-block">Pilih Jenis Tiket</label>
                @foreach($tickets as $ticket)
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="ticket_id" id="ticket_{{ $ticket->id }}" value="{{ $ticket->id }}" required
                            data-ticket='@json(["nama" => $ticket->nama, "harga" => $ticket->harga])'
                            onchange="updateTicketDetails(this.dataset.ticket)">
                        <label class="form-check-label" for="ticket_{{ $ticket->id }}">
                            {{ $ticket->nama }} - Rp {{ number_format($ticket->harga, 0, ',', '.') }}
                        </label>
                    </div>
                @endforeach
                <div class="invalid-feedback">Pilih salah satu jenis tiket.</div>
            </div>

            <div class="mb-4">
                <label for="voucher" class="form-label">Voucher (Opsional)</label>
                <input type="text" id="voucher" name="voucher" placeholder="Masukkan kode voucher jika ada"
                    class="form-control">
            </div>
        </fieldset>

        <button type="submit" class="btn btn-primary w-100 py-3 fw-semibold fs-5">
            Lanjutkan
        </button>
    </form>
</div>

<script>
    // Copy data pemesan ke pemilik tiket saat checkbox dicentang
    document.getElementById('copyData').addEventListener('change', function () {
        if (this.checked) {
            document.getElementById('nama_pemilik').value = document.getElementById('nama_pemesan').value;
            document.getElementById('jenis_identitas_pemilik').value = document.getElementById('jenis_identitas_pemesan').value;
            document.getElementById('nomor_identitas_pemilik').value = document.getElementById('nomor_identitas_pemesan').value;
            document.getElementById('wa_pemilik').value = document.getElementById('wa_pemesan').value;
        } else {
            document.getElementById('nama_pemilik').value = '';
            document.getElementById('jenis_identitas_pemilik').value = '';
            document.getElementById('nomor_identitas_pemilik').value = '';
            document.getElementById('wa_pemilik').value = '';
        }
    });

    // Update detail tiket saat pilihan tiket berubah
    function updateTicketDetails(ticketJson) {
        const ticket = JSON.parse(ticketJson);
        document.getElementById('jenis_tiket').value = ticket.nama;
        document.getElementById('harga_tiket').value = new Intl.NumberFormat('id-ID').format(ticket.harga);
    }

    // Bootstrap validation
    (() => {
        'use strict'

        const forms = document.querySelectorAll('.needs-validation')

        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
@endsection
