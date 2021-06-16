<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(Tag $tag){
        $posts = $tag->posts();
        return view('content.post.index', compact('posts'));
    }
}
