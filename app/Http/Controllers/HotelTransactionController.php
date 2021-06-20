<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\HotelTransaction;
use App\Models\Room;
use Illuminate\Http\Request;

class HotelTransactionController extends Controller
{

    public static function randchar($length){
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $clen = strlen($chars) - 1;
        $id = '';
        for($i = 0 ; $i < $length ; $i++){
            $id .= $chars[mt_rand(0, $clen)];
        }
        return $id;
    }

    public function store(Request $request){
        $carts = Cart::where('user_id', auth()->user()->id);
        $cartUsers = $carts->get();
        $attr = $request->all();
        $attr['hotel_id'] = $request->get('hotel_id');
        $attr['invoice'] = strtoupper('HT'.random_int(0,9).random_int(0,9).random_int(0,9).date("Ymd").$this->randchar(5).'XX');
        $transaction = auth()->user()->hotel_transactions()->create($attr);

        foreach($cartUsers as $cart){
            $transaction->hotel_transaction_details()->create(
                [
                    'room_id' => $cart->room->id,
                    'from_date' => $cart->from_date,
                    'to_date' => $cart->to_date,
                    'nights' => $cart->nights
                ]
            );
            $room = Room::where('id', $cart->room->id);
            $room->update(['status'=>'Booked']);
        }
        $carts->delete();
        return redirect('hotel');
    }

    public function index(){
        $hotel_transactions = auth()->user()->hotel_transactions()->get();
        return view('content.transaction.index', compact('hotel_transactions'));
    }

    public function show(HotelTransaction $hotel_transaction){
        return view('content.transaction.show', compact('hotel_transaction'));
    }
}
