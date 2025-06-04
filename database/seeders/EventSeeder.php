<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Venue; // pastikan Venue sudah ada

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $venue = Venue::first(); // misal eventnya pakai venue pertama

        Event::create([
            'nama_event' => 'Konser Musik Rock',
            'deskripsi' => 'Konser rock terbesar tahun ini',
            'tanggal_mulai' => '2025-08-01',
            'tanggal_selesai' => '2025-08-02',
            'venue_id' => $venue ? $venue->id : null,
            'harga_tiket' => 150000,
            'status' => 'aktif',
        ]);

        Event::create([
            'nama_event' => 'Festival Jazz',
            'deskripsi' => 'Festival jazz dengan musisi terkenal',
            'tanggal_mulai' => '2025-09-10',
            'tanggal_selesai' => '2025-09-12',
            'venue_id' => $venue ? $venue->id : null,
            'harga_tiket' => 200000,
            'status' => 'aktif',
        ]);
    }
}
