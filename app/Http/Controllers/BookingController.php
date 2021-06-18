<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Schedule $schedule){
        return view('content.airplane.book.create', compact('schedule'));
    }
}
