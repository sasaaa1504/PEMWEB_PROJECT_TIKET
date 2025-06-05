<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
public function index()
{
$events = Event::where('event_date', '>=', Carbon::now())
    ->orderBy('event_date', 'asc')
    ->take(4)
    ->get();
    return view('home', compact('events'));
}
}
