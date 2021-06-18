<?php

namespace App\Http\Controllers;

use App\Models\AirplaneTransaction;
use App\Models\Booking;
use Illuminate\Http\Request;

class AirplaneTransactionController extends Controller
{
    public function store(Request $request){
        $bookings = Booking::where('user_id', auth()->user()->id);
        $bookingUsers = $bookings->get();
        $attr = $request->all();
        $attr['airplane_id'] = $request->get('airplane_id');
        $attr['total'] = 1200000;
        $transaction = auth()->user()->airplane_transactions()->create($attr);
        foreach($bookingUsers as $booking){
            $transaction->airplane_transaction_details()->create([
                'seat_id' => $booking->seat->id,
            ]);
        }
        $bookings->delete();
        return back();
    }

    public function show(AirplaneTransaction $airplaneTransaction){
        return view('content.airplane.book.showtransaction', compact('airplaneTransaction'));
    }
}
