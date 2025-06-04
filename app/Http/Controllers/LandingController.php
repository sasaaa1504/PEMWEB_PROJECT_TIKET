<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
    {
        $events = DB::table('events')
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->limit(6)
            ->get();

        return view('home', compact('events'));
    }
}
