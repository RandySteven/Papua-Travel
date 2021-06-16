<?php

namespace App\Http\Controllers;

use App\Models\Airplane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AirplaneController extends Controller
{
    public function index(){
        $airplanes = Airplane::all();
        return view('content.airplane.index', compact('airplanes'));
    }

    public function create(){
        return view('content.airplane.create');
    }

    public function store(Request $request){
        $request->validate([
            'airplane_name' => 'required'
        ]);
        $attr = $request->all();
        $attr['airplane_image'] = $request->file('airplane_image')->store("images/airplane/");
        $attr['slug'] = \Str::slug($request->airplane_name);
        Airplane::create($attr);
        return redirect('airplane');
    }

    public function show(Airplane $airplane){
        return view('content.airplane.show', compact('airplane'));
    }

    public function edit(Airplane $airplane){
        return view('content.airplane.edit', compact('airplane'));
    }

    public function update(Request $request, Airplane $airplane){
        $attr = $request->all();
        if($request->file('airplane_image')){
            Storage::delete($airplane->airplane_image);
            $attr['airplane_image'] = $request->file('airplane_image')->store("images/airplane/");
        }else{
            $attr['airplane_image'] = $airplane->airplane_image;
        }
        $airplane->update($attr);
        return redirect('airplane');
    }

    public function delete(Airplane $airplane){
        if($airplane->delete()){
            Storage::delete($airplane->airplane_image);
        }
        return redirect('airplane');
    }
}
