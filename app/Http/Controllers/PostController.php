<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create_post()
    {
        return view('/post');
    }

    function store(Request $request)
    {
        $request->validate([
            'file' => 'file|max:10240',
            'title' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('uploads', 'public');
            $post->file_path = $path;
        }

        $post->save();

        return redirect('/home')->with('success', 'Post created');
    }
}
