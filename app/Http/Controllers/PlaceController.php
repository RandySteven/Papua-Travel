<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    public function index(){
        $places = Place::all();
        return view('content.place.index', compact('places'));
    }

    public function create(){
        return view('content.place.create');
    }

    public function store(Request $request){
        $request->validate([
            'place_name' => 'required|min:5|max:80',
            'place_description' => 'required|min:5',
            'place_image' => 'image|mimes:png,jpg,jpeg',
            'place_location' => 'required|min:5'
        ]);
        $attr = $request->all();
        $attr['place_image'] = $request->file('place_image')->store("images/place/");
        $attr['slug'] = \Str::slug($request->place_name);
        Place::create($attr);
        return redirect('travel-place');
    }

    public function show(Place $place){
        return view('content.place.show', compact('place'));
    }

    public function edit(Place $place){
        return view('content.place.edit', compact('place'));
    }

    public function update(Request $request, Place $place){
        $request->validate([
            'place_name' => 'required|min:5|max:80',
            'place_description' => 'required|min:5',
            'place_image' => 'image|mimes:png,jpg,jpeg',
            'place_location' => 'required|min:5'
        ]);
        $attr = $request->all();
        if($request->file('place_image')){
            Storage::delete($place->place_image);
            $attr['place_image'] = $request->file('place_image')->store("images/place/");
        }else{
            $attr['place_image'] = $place->place_image;
        }
        $attr['slug'] = \Str::slug($request->place_name);
        $place->update($attr);
        return redirect('travel-place');
    }

    public function delete(Place $place){
        if($place->delete()){
            Storage::delete($place->place_image);
        }
        return back();
    }
}
