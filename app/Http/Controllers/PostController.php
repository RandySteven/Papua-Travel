<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(){
        $posts = Post::get();
        return view('content.post.index', compact('posts'));
    }

    public function create(){
        $tags = Tag::get();
        return view('content.post.create', compact('tags'));
    }

    public function store(Request $request){
        $attr = $request->all();
        $attr['slug'] = \Str::slug($request->title);
        $attr['image'] = $request->file('image')->store("images/diay");
        $post = Post::create($attr);
        $post->tags()->attach($request->get('tags'));
        return redirect('diary/');
    }

    public function show(Post $post){
        return view('content.post.show', compact('post'));
    }

    public function delete(Post $post){
        if($post->delete()){
            Storage::delete($post->image);
        }
        return redirect('diary');
    }
}
