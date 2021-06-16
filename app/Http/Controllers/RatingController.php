<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index(){
        $ratings = Rating::get();
        return view('content.rating.index', compact('ratings'));
    }

    public function show(Rating $rating){
        $hotels = Hotel::where('ratingId', $rating->id)->get();
        return view('content.hotel.index', compact('hotels'));
    }
}
