<?php

namespace App\Http\Controllers;

use App\Models\Tradition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TraditionController extends Controller
{
    public function index(){
        $traditions = Tradition::get();
        return view('content.tradition.index', compact('traditions'));
    }

    public function create(){
        return view('content.tradition.create');
    }

    public function store(Request $request){
        $request->validate([
            'tradition_name' => 'required|min:5|max:80',
            'tradition_description' => 'required|min:5',
            'tradition_image' => 'image|mimes:png,jpg,jpeg',
        ]);
        $attr = $request->all();
        $attr['tradition_image'] = $request->file('tradition_image')->store("images/tradition");
        $attr['slug'] = \Str::slug($request->tradition_name);
        Tradition::create($attr);
        return redirect('tradition');
    }

    public function show(Tradition $tradition){
        return view('content.tradition.show', compact('tradition'));
    }

    public function edit(Tradition $tradition){
        return view('content.tradition.edit', compact('tradition'));
    }

    public function update(Tradition $tradition, Request $request){
        $request->validate([
            'tradition_name' => 'required|min:5|max:80',
            'tradition_description' => 'required|min:5',
            'tradition_image' => 'image|mimes:png,jpg,jpeg',
        ]);
        $attr = $request->all();
        if($request->file('tradition_image')){
            Storage::delete($tradition->tradition_image);
            $attr['tradition_image'] = $request->file('tradition_image')->store("images/tradition");
        }else{
            $attr['tradition_image'] = $tradition->tradition_image;
        }
        $attr['slug'] = \Str::slug($request->tradition_name);
        $tradition->update($attr);
        return redirect('tradition');
    }

    public function delete(Tradition $tradition){
        if($tradition->delete()){
            Storage::delete($tradition->tradition_image);
        }
        return redirect('tradition');
    }
}
