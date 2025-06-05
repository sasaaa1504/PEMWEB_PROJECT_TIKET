<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Tampilkan form beli tiket
    public function showBuyForm(Event $event)
    {
        $tickets = Ticket::where('event_id', $event->id)->get();
        return view('orders.buy', compact('event', 'tickets'));
    }

    // Simpan order
    public function store(Request $request, Event $event)
    {
        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'jumlah_tiket' => 'required|integer|min:1',
        ]);

        $ticket = Ticket::findOrFail($request->ticket_id);
        $jumlah = $request->jumlah_tiket;

        // Cek stok tersedia
        if ($ticket->quantity - $ticket->sold < $jumlah) {
            return back()->withErrors(['jumlah_tiket' => 'Stok tiket tidak mencukupi.'])->withInput();
        }

        $total = $jumlah * $ticket->price;

        // Buat order
        $order = Order::create([
            'user_id' => Auth::id(), // Sesuai struktur database
            'order_number' => Order::generateOrderNumber(),
            'total_amount' => $total,
            'status' => 'pending',
        ]);

        // Simpan item tiket
        $order->orderItems()->create([
            'ticket_id' => $ticket->id,
            'jumlah_tiket' => $jumlah,
            'harga' => $ticket->price,
        ]);

        // Update jumlah sold tiket
        $ticket->increment('sold', $jumlah);

        return redirect()->route('events.show', $event->id)->with('success', 'Tiket berhasil dipesan.');
    }
}
