<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function __construct(
        protected PostService $postService
    ) {}

    public function index(): View
    {
        return $this->postService->allPosts();
    }

    public function create()
    {
        return $this->postService->createPost();
    }

    public function store(StorePostRequest $request)
    {
        return $this->postService->storePost($request);
    }

    public function show(Post $post)
    {
        return $this->postService->showPost($post);
    }

    public function edit(Request $request, Post $post)
    {
        return $this->postService->editPost($request, $post);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        return $this->postService->updatePost($request, $post);
    }

    public function destroy(Post $post)
    {
        return $this->postService->deletePost($post);
    }
}
