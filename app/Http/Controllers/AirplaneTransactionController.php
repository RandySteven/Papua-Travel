<?php

namespace App\Http\Controllers;

use App\Models\AirplaneTransaction;
use App\Models\Booking;
use App\Models\Seat;
use Illuminate\Http\Request;

class AirplaneTransactionController extends Controller
{
    public static function randchar($length){
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $clen = strlen($chars) - 1;
        $id = '';
        for($i = 0 ; $i < $clen ; $i++){
            $id .= $chars[mt_rand(0, $clen)];
        }
        return $id;
    }

    public function store(Request $request){
        $bookings = Booking::where('user_id', auth()->user()->id);
        $bookingUsers = $bookings->get();
        $attr = $request->all();
        $attr['airplane_id'] = $request->get('airplane_id');
        $attr['total'] = 1200000;
        $attr['invoice'] = strtoupper('AT'.random_int(0,9).random_int(0,9).random_int(0,9).date("Ymd").$this->randchar(5).'XX');
        $transaction = auth()->user()->airplane_transactions()->create($attr);
        foreach($bookingUsers as $booking){
            $transaction->airplane_transaction_details()->create([
                'seat_id' => $booking->seat->id,
            ]);
            $seat = Seat::where('id', $booking->seat->id);
            $seat->update(['status' => 'Booked']);
        }
        $bookings->delete();
        return redirect('airplane');
    }

    public function show(AirplaneTransaction $airplaneTransaction){
        return view('content.airplane.book.showtransaction', compact('airplaneTransaction'));
    }

    public function index(){
        $transactions = AirplaneTransaction::where('user_id', auth()->user()->id)->latest()->get();
        return view('content.airplane.book.transaction', compact('transactions'));
    }
}
