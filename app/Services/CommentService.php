<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentService
{
    /**
     * Store comment
     */
    public function store(array $data)
    {
        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $data['post_id'],
            'content' => $data['content']
        ]);

        return redirect()->back();
    }

    public function update($comment, array $data): Comment
    {
        $comment->update([
            'content' => $data['content'],
        ]);
        return $comment;
    }

    public function destroy(Comment $comment): void
    {
        $comment->delete();
    }
}
