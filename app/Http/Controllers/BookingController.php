<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Schedule;
use App\Models\Seat;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Schedule $schedule){
        return view('content.airplane.book.create', compact('schedule'));
    }

    public function store(Request $request){
        $seats = $request->get('seats');
        foreach($seats as $seat){
            Booking::create([
                'user_id' => $request->get('user_id'),
                'seat_id' => $seat,
                'departure_date' => $request->departure_date,
                'to' => $request->to,
                'from' => $request->from,
                'schedule_time' => $request->schedule_time,
                'arival_time' => $request->arival_time
            ]);
        }
        return redirect('booking');
    }

    public function index(){
        $bookings = Booking::where('user_id', auth()->user()->id)->get();
        return view('content.airplane.book.index', compact('bookings'));
    }

    public function delete(Booking $booking){
        $booking->where('seat_id', $booking->seat_id)->delete();
        return back();
    }
}
