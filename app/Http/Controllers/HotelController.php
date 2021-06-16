<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function index(){
        $hotels = Hotel::get();
        return view('content.hotel.index', compact('hotels'));
    }

    public function create(){
        $ratings = Rating::get();
        return view('content.hotel.create', compact('ratings'));
    }

    public function store(Request $request){
        $request->validate([
            'hotel_name' => 'required|min:5|max:70',
            'hotel_description' => 'required|min:5',
            'hotel_address' => 'required|min:5',
            'hotel_image' => 'image|mimes:png,jpg,jpeg',
            'ratingId' => 'required'
        ]);
        $attr = $request->all();
        $attr['ratingId'] = $request->get('ratingId');
        $attr['slug'] = \Str::slug($request->hotel_name);
        $attr['hotel_image'] = $request->file('hotel_image')->store('images/hotel/');
        Hotel::create($attr);
        return redirect('hotel');
    }

    public function show(Hotel $hotel){
        return view('content.hotel.show', compact('hotel'));
    }

    public function edit(Hotel $hotel){
        $ratings = Rating::get();
        return view('content.hotel.edit', compact('hotel', 'ratings'));
    }

    public function update(Hotel $hotel, Request $request){
        $attr = $request->all();
        $attr['ratingId'] = $request->get('ratingId');
        $attr['slug'] = \Str::slug($request->hotel_name);
        if($request->file('hotel_image')){
            Storage::delete($hotel->hotel_image);
            $attr['hotel_image'] = $request->file('hotel_image')->store('images/hotel/');
        }else{
            $attr['hotel_image'] = $hotel->hotel_image;
        }
        $hotel->update($attr);
        return redirect('hotel');
    }

    public function delete(Hotel $hotel){
        if($hotel->delete()){
            Storage::delete($hotel->hotel_image);
        }
        return redirect('hotel');
    }
}
