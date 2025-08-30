<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'post_id' => 'required|integer'
        ]);

        $post = Post::find($validated['post_id']);
        $post->comments()->create([
            'content' => $validated['content'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }
}
