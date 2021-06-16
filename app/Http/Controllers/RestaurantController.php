<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    public function index(){
        $restaurants = Restaurant::get();
        return view('content.restaurant.index', compact('restaurants'));
    }

    public function create(){
        $categories = Category::get();
        return view('content.restaurant.create', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'restaurant_name' => 'required|min:5|max:80',
            'daysOpen' => 'required',
            'restaurant_image' => 'image|mimes:png,jpg,jpeg',
            'time_open' => 'required',
            'time_close' => 'required',
            'restaurant_description' => 'required|min:5',
            'restaurant_address' => 'required|min:5'
        ]);
        $attr = $request->all();
        $attr['daysOpen'] = json_encode($request->daysOpen);
        $attr['restaurant_image'] = $request->file('restaurant_image')->store("images/restaurant/");
        $attr['categoryId'] = $request->get('categoryId');
        $attr['slug'] = \Str::slug($request->restaurant_name);
        Restaurant::create($attr);
        return redirect('restaurant');
    }

    public function show(Restaurant $restaurant){
        return view('content.restaurant.show', compact('restaurant'));
    }

    public function edit(Restaurant $restaurant){
        $categories = Category::get();
        return view('content.restaurant.edit', compact('restaurant', 'categories'));
    }

    public function update(Restaurant $restaurant, Request $request){
        $request->validate([
            'restaurant_name' => 'required|min:5|max:80',
            'daysOpen' => 'required',
            'restaurant_image' => 'image|mimes:png,jpg,jpeg',
            'time_open' => 'required',
            'time_close' => 'required',
            'restaurant_description' => 'required|min:5',
            'restaurant_address' => 'required|min:5',
            'categoryId' => 'required'
        ]);
        $attr = $request->all();
        $attr['daysOpen'] = json_encode($request->daysOpen);
        if($request->file('restaurant_image')){
            Storage::delete($restaurant->restaurant_image);
            $attr['restaurant_image'] = $request->file('restaurant_image')->store("images/restaurant/");
        }else{
            $attr['restaurant_image'] = $restaurant->restaurant_image;
        }
        $attr['categoryId'] = $request->get('categoryId');
        $attr['slug'] = \Str::slug($request->restaurant_name);
        $restaurant->update($attr);
        return redirect('restaurant');
    }

    public function delete(Restaurant $restaurant){
        if($restaurant->delete()){
            Storage::delete($restaurant->restaurant_image);
        }
        return redirect('restaurant');
    }

    public static function autoupdate(Restaurant $restaurant){
        $time_close = $restaurant->time_close;
        $time = date('H:i');
        echo $time;
        if($time >= $time_close){
            $restaurant->update(['status'=>'Close']);
        }
    }
}
