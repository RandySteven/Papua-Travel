<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
        return view('content.category.index', compact('categories'));
    }

    public function create(){
        return view('content.category.create');
    }

    public function store(Request $request){
        $attr = $request->all();
        $attr['category_image'] = $request->file('category_image')->store("images/category/");
        $attr['slug'] = \Str::slug($request->category);
        Category::create($attr);
        return redirect('category');
    }

    public function show(Category $category){
        $restaurants = Restaurant::get();
        return view('content.category.show', [
            'category' => $category,
            'restaurants' => $restaurants
        ]);
    }

    public function edit(Category $category){
        return view('content.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category){
        $attr = $request->all();
        if($request->file('category_image')){
            Storage::delete($category->category_image);
            $attr['category_image'] = $request->file('category_image')->store("images/category/");
        }else{
            $attr['category_image'] = $category->category_image;
        }
        $attr['slug'] = \Str::slug($request->category);
        $category->update($attr);
        return redirect('category');
    }

    public function delete(Category $category){
        if($category->delete()){
            Storage::delete($category->category_image);
        }
        return redirect('category');
    }
}
