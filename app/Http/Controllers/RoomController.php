<?php

namespace App\Http\Controllers;

use App\Models\HotelTransactionDetail;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'room_number' => 'required|alpha_num',
            'room_price_pernight' => 'required|integer',
            'floor' => 'required|integer',
            'beds' => 'required'
        ]);
        $attr = $request->all();
        $attr['status'] = 'Aviable';
        $attr['hotel_id'] = $request->get('hotel_id');
        $attr['room_image'] = $request->file('room_image')->store("images/rooms/");
        Room::create($attr);
        return back();
    }

    public function show(Room $room){
        return view('content.hotel.room.show', compact('room'));
    }

    public function delete(Room $room){
        if($room->delete()){
            Storage::delete($room->room_image);
        }
        return back();
    }

    public static function autoupdate(Room $room){
        $transaction = HotelTransactionDetail::where('room_id', $room->id)->first();
        $getDate = getdate(date("U"));
        if("$getDate[mon]"<10){
            $today_date = "$getDate[year]-0$getDate[mon]-$getDate[mday]";
        }else{
            $today_date = "$getDate[year]-$getDate[mon]-$getDate[mday]";
        }
        if($transaction->to_date == $today_date){
            $room->update(['status' => 'Aviable']);
        }
    }
}
