<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function store(Request $request){
        $attr = $request->all();
        $attr['airplane_id'] = $request->get('airplane_id');
        $attr['status'] = 'Aviable';
        Seat::create($attr);
        return redirect('airplane');
    }
}
