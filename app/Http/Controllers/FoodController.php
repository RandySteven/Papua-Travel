<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'food_name' => 'required|min:5|max:80',
            'food_description' => 'required|min:5',
            'food_price' => 'required|integer',
            'food_image' => 'image|mimes:png,jpg,jpeg'
        ]);
        $attr = $request->all();
        $attr['restaurantId'] = $request->get('restaurantId');
        $attr['food_image'] = $request->file('food_image')->store("images/food/");
        $attr['slug'] = \Str::slug($request->food_name);
        Food::create($attr);
        return redirect('restaurant');
    }

    public function delete(Food $food){
        if($food->delete()){
            Storage::delete($food->food_image);
        }
        return back();
    }
}
