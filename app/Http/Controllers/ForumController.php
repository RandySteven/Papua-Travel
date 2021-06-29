<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ForumController extends Controller
{
    public function create(){
        $tags = Tag::get();
        return view('content.forums.create', compact('tags'));
    }

    public function index(){
        $forums = Forum::all();
        return view('content.forums.index', compact('forums'));
    }

    public function store(Request $request){
        $request->validate([
            'forum_title' => 'required|min:5|max:50',
            'body' => 'required',
            'thumbnail' => 'file|mimes:png,jpg,jpeg,gif|image'
        ]);
        $attr = $request->all();
        // dd($attr);
        $attr['thumbnail'] = $request->file('thumbnail')->store("images/forum");
        $attr['slug'] = \Str::slug($request->forum_title);
        $forum = auth()->user()->forums()->create($attr);
        // $forum->tags()->attach($request->tags);
        return redirect('forums');
    }

    public function show(Forum $forum){
        return view('content.forums.show', compact('forum'));
    }

    public function edit(Forum $forum){
        $tags = Tag::get();
        return view('content.forums.edit', compact('forum', 'tags'));
    }

    public function update(Forum $forum, Request $request){

    }

    public function delete(Forum $forum){
        if($forum->delete()){
            Storage::delete($forum->thumbnail);
        }
        return redirect('forums');
    }
}
