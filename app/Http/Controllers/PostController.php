<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

class PostController extends Controller
{
    public function create_post()
    {
        $submitButton = 'Create Post';
        return view('/post', compact('submitButton'));
    }

    public function status(int $id)
    {
        try
        {
            $post = Post::findOrFail($id);
        }catch(ModelNotFoundException)
        {
            return redirect('/')->with('error', 'Post not found');
        }

        return view('/status', ['post' => $post]);
    }


    function store(Request $request)
    {
        $request->validate([
            'file' => 'file|max:10240',
            'title' => 'required',
            'content' => 'required'
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

    function edit_post(int $id)
    {
        try
        {
           $post = Post::findOrFail($id);
           $submitButton = 'Edit Post';

        }catch (ModelNotFoundException $e)
        {
            return redirect('/')->with('error', 'Post not found');
        }
        return view('/post', ['post' => $post], compact('submitButton'));
    }

    function update(int $id, Request $request)
    {
        $request->validate([
            'file' => 'file|max:10240',
            'title' => 'required',
            'content' => 'required'
        ]);

        try
        {

            $post = Post::findOrFail($id);
            $post->title = $request->input('title');
            $post->content = $request->input('content');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = $image->store('uploads', 'public');
                $post->file_path = $path;
            }
            $post->save();

        }catch (ModelNotFoundException $e)
        {
            return redirect('/')->with('error', 'Post not found');
        }

        return redirect('/')->with('success', 'Post edited');
    }

    function delete(int $id, Request $request)
    {
        try
        {
            $post = Post::findOrFail($id);
            $post->delete();

        }catch(ModelNotFoundException $e)
        {
            return redirect('/')->with('error', 'Post not found');
        }

        return redirect('/')->with('error', 'Post deleted');
    }
}
