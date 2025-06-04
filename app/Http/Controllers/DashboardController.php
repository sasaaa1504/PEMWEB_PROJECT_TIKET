<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil event yang user saat ini buat (sesuai user_id)
        $events = Event::where('user_id', Auth::id())->get();

        // Kirim ke view dashboard
        return view('dashboard.index', compact('events'));
    }
}
