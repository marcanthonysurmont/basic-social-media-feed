<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    function add(int $post_id, Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'You need to be logged in for that');
        }

        $request->validate([
            'content' => 'required'
        ]);

        try
        {
            $comment = new Comment();
            $comment->post_id = $post_id;
            $comment->user_id = Auth::id();
            $comment->comment = $request->input('content');
            $comment->save();

        }catch(ModelNotFoundException)
        {
            return redirect('/login')->with('error', 'You need to be logged in for that');
        }

        return redirect()->back()->with('success', 'Comment added');
    }

    function delete(Request $request)
    {
        try
        {
            $comment_id = $request->input('delete');
            $comment = Comment::findOrFail($comment_id);
            $comment->delete();

        }catch(ModelNotFoundException)
        {
            return redirect('/login')->with('error', 'You need to be logged in for that');
        }

        return redirect()->back()->with('error', 'Comment deleted');
    }
}
