<?php

namespace App\Http\Controllers;

use App\Models\AirplaneTransaction;
use App\Models\AirplaneTransactionDetail;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'seat' => 'required'
        ]);
        $attr = $request->all();
        $attr['airplane_id'] = $request->get('airplane_id');
        $attr['status'] = 'Aviable';
        Seat::create($attr);
        return redirect('airplane');
    }

    public static function autoupdate(Seat $seat){
        $transaction = AirplaneTransactionDetail::where('seat_id', $seat->id)->first();
        $getDate = getdate(date("U"));
        if("$getDate[mon]"<10){
            $today_date = "$getDate[year]-0$getDate[mon]-$getDate[mday]";
        }else{
            $today_date = "$getDate[year]-$getDate[mon]-$getDate[mday]";
        }
        if($transaction->airplane_transaction()->schedule_date == $today_date){
            $seat->update(['status'=>'Aviable']);
        }
    }
}
