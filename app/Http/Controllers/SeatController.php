<?php

namespace App\Http\Controllers;

use App\Models\AirplaneTransaction;
use App\Models\AirplaneTransactionDetail;
use App\Models\Schedule;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'seat' => 'required'
        ]);
        $attr = $request->all();
        $attr['schedule_id'] = $request->get('schedule_id');
        $attr['status'] = 'Aviable';
        Seat::create($attr);
        return redirect('airplane');
    }

    public function generateSeat(Request $request){
        $row = $request->row;
        for($i = 1 ; $i <= $row ; $i++){
            for($j = 1 ; $j <= 6 ; $j++){
                if($j == 1){
                    $code = "A";
                }
                if($j == 2){
                    $code = "B";
                }
                if($j == 3){
                    $code = "C";
                }
                if($j == 4){
                    $code = "E";
                }
                if($j == 5){
                    $code = "F";
                }
                if($j == 6){
                    $code = "G";
                }
                $seat = "$i$code";
                Seat::create([
                    'seat' => $seat,
                    'status' => 'Aviable',
                    'schedule_id' => $request->schedule_id
                ]);
            }
        }
        return back();
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
