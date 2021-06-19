<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use DateTime;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request){
        $attr = $request->all();
        $duplicate = Cart::where('room_id', $request->room_id)->first();
        if($duplicate){
            return back();
        }
        $attr['from_date'] = DateTime::createFromFormat('Y-m-d', $request->get('from_date'));
        $attr['to_date'] = DateTime::createFromFormat('Y-m-d', $request->get('to_date'));
        $diff = date_diff($attr['from_date'], $attr['to_date']);
        $attr['nights'] = $diff->format('%d');
        if($attr['nights'] < 1){
            return back();
        }
        $attr['room_id'] = $request->get('room_id');
        $attr['user_id'] = auth()->user()->id;
        Cart::create($attr);
        return redirect('cart');
    }

    public function index(){
        $user_id = auth()->user()->id;
        $carts = Cart::where('user_id', $user_id)->get();
        return view('content.hotel.cart.cart', compact('carts'));
    }

    public function delete(Cart $cart){
        $cart->where('room_id', $cart->room_id)->delete();
        return back();
    }
}
