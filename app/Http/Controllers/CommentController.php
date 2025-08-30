<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function __construct(
        protected CommentService $commentService
    ) {}

    public function store(Request $request)
    {
        $data = $request->validate([
            'post_id' => 'required|integer',
            'content' => 'required|string',
        ]);

        return $this->commentService->store($data);
    }

    public function update(Request $request, Comment $comment)
    {
        Gate::authorize('update', $comment);

        $data = $request->validate([
            'content' => 'required|string',
        ]);

        $comment = $this->commentService->update($comment, $data);

        return response()->json([
            'success' => true,
            'comment' => $comment,
            'message' => 'Comment updated successfully!',
        ]);
    }

    public function destroy(Comment $comment)
    {
        Gate::authorize('delete', $comment);

        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Comment deleted successfully!',
            'id' => $comment->id,
        ]);
    }
}
