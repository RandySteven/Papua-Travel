<?php

namespace App\Http\Controllers;

use App\Models\AirplaneTransaction;
use App\Models\Booking;
use App\Models\Seat;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

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
        // $attr = $request->all();
        // // dd($attr);

        // $attr['airplane_id'] = $request->get('airplane_id');
        // $attr['total'] = 1200000;
        $invoice = strtoupper('AT'.random_int(0,9).random_int(0,9).random_int(0,9).date("Ymd").$this->randchar(5).'XX');
        $transaction = auth()->user()->airplane_transactions()->create([
            'airplane_id' => $request->get('airplane_id'),
            'invoice' => $invoice,
            'departure_date' => $request->departure_date,
            'to' => $request->to,
            'from' => $request->from,
            'schedule_time' => $request->schedule_time,
            'arival_time' => $request->arival_time,
        ]);
        foreach($bookingUsers as $key => $booking){
            $transaction->airplane_transaction_details()->create([
                'seat_id' => $booking->seat->id,
                'passenger_name' => $request->input('passenger_name')[$key],
                'passenger_age' => $request->input('passenger_age')[$key]
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

    public function delete(AirplaneTransaction $airplaneTransaction){
        $airplaneTransaction->delete();
        return redirect('airplane-transaction');
    }
}
