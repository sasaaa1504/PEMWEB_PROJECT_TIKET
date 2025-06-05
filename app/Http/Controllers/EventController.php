<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;


class EventController extends Controller
{
public function index(Request $request)
{
    $query = Event::query();

    // Filter lokasi
    if ($request->filled('lokasi')) {
        $query->where('venue', 'like', '%' . $request->lokasi . '%');
    }

    // Filter tanggal
    if ($request->filled('tanggal')) {
        $query->whereDate('event_date', $request->tanggal);
    }

    // Filter harga maksimal
    if ($request->filled('harga')) {
        $query->where('price', '<=', $request->harga);
    }

    // Sorting
    if ($request->sort == 'termurah') {
        $query->orderBy('price', 'asc');
    } elseif ($request->sort == 'terbaru') {
        $query->orderBy('event_date', 'desc');
    } else {
        $query->orderBy('event_date', 'asc');
    }

    // Pagination, 10 data per halaman
    $events = $query->paginate(10);

    // Supaya query string pagination tetap bawa parameter filter/sort
    $events->appends($request->all());

    return view('events.index', compact('events'));
}


    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'venue' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
        }

        Event::create([
            'name' => $request->name,
            'event_date' => $request->event_date,
            'venue' => $request->venue,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('events.index')->with('success', 'Event berhasil dibuat!');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    public function eoIndex()
    {
        // Ambil user EO yang sedang login
        $user = Auth::user();

        // Ambil event yang dibuat user EO ini
        $events = Event::where('user_id', $user->id)->get();

        // Kirim data ke view khusus EO
        return view('events.eo_index', compact('events'));
    }

public function destroy($id)
{
    $event = Event::findOrFail($id);

    if ($event->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    // Hapus file gambar di storage jika ada
if ($event->image) {
    Storage::disk('public')->delete($event->image);
}

    $event->delete();

    return redirect()->route('dashboard.eo')->with('success', 'Event berhasil dihapus!');
}


        public function edit($id)
{
    $event = Event::findOrFail($id);

    // Optional: cek otorisasi (hanya pemilik atau admin yang boleh edit)
    if ($event->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    return view('events.edit', compact('event'));
}

public function update(Request $request, $id)
{
    $event = Event::findOrFail($id);

    if ($event->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'event_date' => 'required|date',
        'venue' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Update image jika ada file baru
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('events', 'public');
        $event->image = $imagePath;
    }

    $event->name = $request->name;
    $event->event_date = $request->event_date;
    $event->venue = $request->venue;
    $event->description = $request->description;
    $event->price = $request->price;

    $event->save();

    return redirect()->route('dashboard.eo')->with('success', 'Event berhasil diperbarui!');
}

}
