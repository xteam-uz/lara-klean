<?php

namespace App\Services;

use App\Events\PostCreated;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Notifications\Post\PostCreated as NotifyPostCreated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostService
{
    /*
     * Get all posts
     */
    public function allPosts(): View
    {
        $posts = Post::orderBy('id', 'desc')->paginate(12);

        return view('pages.post.index', compact('posts'));
    }

    /*
     * Create post
     */
    public function createPost(): View
    {
        $tags = Tag::all();

        $categories = Category::all();

        return view('pages.post.create', compact('categories', 'tags'));
    }

    /*
     * Store post
     */
    public function storePost($request): RedirectResponse
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
            'photo' => $path,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
        ]);

        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        PostCreated::dispatch($post);

        Auth::user()->notify(new NotifyPostCreated($post));

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /*
     * Show post
     */
    public function showPost($post): View
    {
        // Load the post with its user and category
        $recentPosts = Post::where('id', '!=', $post->id)
            ->latest()
            ->take(5)
            ->get();

        // Randomly select 5 categories with their post counts
        $categories = Category::withCount('posts')->inRandomOrder()->limit(5)->get();

        // Randomly select 5 tags with their post counts
        $tags = Tag::withCount('posts')->inRandomOrder()->limit(5)->get();

        return view('pages.post.show', compact('post', 'recentPosts', 'categories', 'tags'));
    }

    /*
     * Edit post
     */
    public function editPost($request, $post): View
    {
        Gate::authorize('update', $post);
        return view('pages.post.edit', compact('post'));
    }

    /*
     * Update post
     */
    public function updatePost($request, $post): RedirectResponse
    {
        Gate::authorize('update', $post);

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

    /*
     * Delete post
     */
    public function deletePost($post): RedirectResponse
    {
        Gate::authorize('delete', $post);

        if ($post->photo && Storage::exists($post->photo)) {
            Storage::delete($post->photo);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
