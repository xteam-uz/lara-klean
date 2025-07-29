<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::orderBy('id', 'desc')->paginate(6);

        return view('pages.post.index', compact('posts'));
    }

    public function create(): View
    {
        return view('pages.post.create');
    }

    public function store(StorePostRequest $request)
    {
        if ($request->hasFile('photo')) {
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name);
        } else {
            $path = null;
        }

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'photo' => $path
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post): View
    {
        $recentPosts = Post::where('id', '!=', $post->id)
            ->latest()
            ->take(5)
            ->get();
        return view('pages.post.show', compact('post', 'recentPosts'));
    }

    public function edit(Post $post): View
    {
        return view('pages.post.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->hasFile('photo')) {
            if ($post->photo && Storage::exists($post->photo)) {
                Storage::delete($post->photo);
            }
            $name = $request->file('photo')->getClientOriginalName();
            $photoPath = $request->file('photo')->storeAs('post-photos', $name);
        } else {
            $photoPath = $post->photo;
        }
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'photo' => $photoPath
        ]);

        return redirect()
            ->route('posts.show', $post->id)
            ->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->photo && Storage::exists($post->photo)) {
            Storage::delete($post->photo);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
