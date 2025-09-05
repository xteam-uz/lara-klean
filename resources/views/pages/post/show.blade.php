<x-layouts.layout title="Blog - {{ $post->title }}">
    <!-- Page Header Start -->
    <x-page-header title="Single blog" postTitle="{{ $post->title }}" />
    <!-- Page Header End -->

    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="d-flex justify-content-between mb-3">
                        <a class="text-secondary text-uppercase font-weight-medium" href="{{ route('posts.index') }}">Back
                            to posts</a>

                        <div class="d-flex align-items-center gap-2">
                            @canany(['update', 'delete'], $post)
                                <a class="btn btn-primary mr-2" href="{{ route('posts.edit', $post->id) }}">Edit
                                    Post</a>
                                <form class="m-0" action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete Post</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                    <div class="mb-5">
                        <div class="d-flex mb-2">
                            @foreach ($post->tags as $tag)
                                <a class="text-secondary text-uppercase font-weight-medium"
                                    href="">{{ $tag->name }}</a>
                                <span class="text-primary px-2">|</span>
                            @endforeach

                            <a class="text-secondary text-uppercase font-weight-medium"
                                href="">{{ $post->created_at->format('F d, Y') }}</a>
                        </div>

                        <h1 class="section-title mb-3">{{ $post->title }}</h1>
                        <p>
                            {{ $post->description }}
                        </p>
                    </div>

                    <div class="mb-5">
                        <img class="img-fluid rounded w-100 mb-4"
                            src="{{ $post->photo ? asset('storage/' . $post->photo) : 'https://www.dummyimage.com/300x200/000/fff' }}"
                            alt="{{ $post->title }}">

                        {{-- <img class="img-fluid rounded w-50 float-left mr-4 mb-3" src="images/blog-1.jpg" alt="Image"> --}}
                        {{-- <img class="img-fluid rounded w-100" src="{{ asset('storage/' . $post->photo) }}"
                            alt="{{ $post->title }}"> --}}

                        <p>
                            {{ $post->content }}
                        </p>
                    </div>

                    <div class="mb-5">
                        <h3 class="mb-4 section-title">{{ $post->comments()->count() }} Comments</h3>
                        @foreach ($post->comments as $comment)
                            <div class="media mb-4" id="comment-{{ $comment->id }}">
                                <img src="{{ asset('images/about.jpg') }}" alt="Image"
                                    class="img-fluid rounded-circle mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6>
                                        {{ $comment->user->name }}
                                        <small><i>{{ $comment->created_at->format('F d, Y') }}</i></small>

                                        {{-- Edit/Delete faqat o‘z commentiga --}}
                                        @can('update', $comment)
                                            <a href="javascript:void(0);" class="text-primary ml-2 edit-comment"
                                                data-id="{{ $comment->id }}">
                                                ✏️
                                            </a>
                                        @endcan
                                        @can('delete', $comment)
                                            <a href="javascript:void(0);" class="text-danger ml-2 delete-comment"
                                                data-id="{{ $comment->id }}">
                                                🗑️
                                            </a>
                                        @endcan
                                    </h6>
                                    <p class="comment-content">{{ $comment->content }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="bg-light rounded p-5">
                        <h3 class="mb-4 section-title">Leave a comment</h3>
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea name="content" cols="30" rows="5" class="form-control p-4 mb-4"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                <input type="submit" value="Leave Comment" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="d-flex flex-column text-center bg-secondary rounded mb-5 py-5 px-4">
                        <img class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px;"
                            src="{{ $post->user->photo ? asset('storage/' . $post->user->photo) : 'https://www.dummyimage.com/500x500/000/fff' }}"
                            alt="{{ $post->title }}">
                        {{-- src="{{ asset('images/user.jpg') }}" --}}

                        <h3 class="text-white mb-3">{{ $post->user->name }}</h3>
                        <p class="text-white m-0">{{ $post->user->email }}</p>
                    </div>
                    <div class="mb-5">
                        <div class="w-100">
                            <div class="input-group">
                                <input type="text" class="form-control" style="padding: 25px;" placeholder="Keyword">
                                <div class="input-group-append">
                                    <button class="btn btn-primary px-4">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="mb-4 section-title">Categories</h3>
                        <ul class="list-inline m-0">
                            @foreach ($categories as $category)
                                <li class="mb-1 py-2 px-3 bg-light d-flex justify-content-between align-items-center">
                                    <a class="text-dark" href="#"><i
                                            class="fa fa-angle-right text-secondary mr-2"></i>{{ $category->name }}</a>
                                    <span class="badge badge-primary badge-pill">{{ $category->posts_count }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mb-5">
                        <img src="img/blog-1.jpg" alt="" class="img-fluid rounded">
                    </div>
                    <div class="mb-5">
                        <h3 class="mb-4 section-title">Recent Post</h3>
                        @foreach ($recentPosts as $recentPost)
                            <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                <img class="img-fluid rounded"
                                    src="{{ $recentPost->photo ? asset('storage/' . $recentPost->photo) : 'https://www.dummyimage.com/300x200/000/fff' }}"
                                    style="width: 80px; height: 80px; object-fit: cover;" alt="">
                                <div class="d-flex flex-column pl-3">
                                    <a class="text-dark mb-2" href="">{{ $recentPost->title }}</a>
                                    <div class="d-flex align-items-center">
                                        @foreach ($recentPost->tags as $tag)
                                            <small><a class="text-secondary text-uppercase font-weight-medium"
                                                    href="">{{ $tag->name }}</a></small>
                                            @if (!$loop->last)
                                                <span class="text-primary px-2">|</span>
                                            @endif
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-5">
                        <img src="img/blog-2.jpg" alt="" class="img-fluid rounded">
                    </div>
                    <div class="mb-5">
                        <h3 class="mb-4 section-title">Tag Cloud</h3>
                        <div class="d-flex flex-wrap m-n1">
                            @foreach ($tags as $tag)
                                <a href="" class="btn btn-outline-secondary m-1">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-5">
                        <img src="img/blog-3.jpg" alt="" class="img-fluid rounded">
                    </div>
                    <div>
                        <h3 class="mb-4 section-title">Plain Text</h3>
                        Aliquyam sed lorem stet diam dolor sed ut sit. Ut sanctus erat ea est aliquyam dolor et. Et no
                        consetetur eos labore ea erat voluptua et. Et aliquyam dolore sed erat. Magna sanctus sed eos
                        tempor
                        rebum dolor, tempor takimata clita sit et elitr ut eirmod.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Edit tugmasi
            document.querySelectorAll(".edit-comment").forEach(btn => {
                btn.addEventListener("click", () => {
                    const id = btn.dataset.id;
                    const commentDiv = document.querySelector(`#comment-${id}`);
                    const contentEl = commentDiv.querySelector(".comment-content");
                    const oldContent = contentEl.innerText;

                    // Textarea qo‘yib qo‘yamiz
                    contentEl.outerHTML = `
                <div class="edit-form">
                    <textarea class="form-control mb-2" id="edit-textarea-${id}">${oldContent}</textarea>
                    <button class="btn btn-sm btn-success save-edit" data-id="${id}">Save</button>
                    <button class="btn btn-sm btn-danger cancel-edit" data-id="${id}">Cancel</button>
                </div>
            `;

                    // Cancel
                    commentDiv.querySelector(".cancel-edit").addEventListener("click", () => {
                        commentDiv.querySelector(".edit-form").outerHTML =
                            `<p class="comment-content">${oldContent}</p>`;
                    });

                    // Save
                    commentDiv.querySelector(".save-edit").addEventListener("click", async () => {
                        const newContent = commentDiv.querySelector(
                            `#edit-textarea-${id}`).value;

                        let res = await fetch(`/comments/${id}`, {
                            method: "PUT",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({
                                content: newContent
                            })
                        });

                        let data = await res.json();

                        if (data.success) {
                            commentDiv.querySelector(".edit-form").outerHTML =
                                `<p class="comment-content">${data.comment.content}</p>`;
                        }
                    });
                });
            });

            // Delete tugmasi
            document.querySelectorAll(".delete-comment").forEach(btn => {
                btn.addEventListener("click", async () => {
                    const id = btn.dataset.id;

                    if (!confirm("Delete this comment?")) return;

                    let res = await fetch(`/comments/${id}`, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    });

                    let data = await res.json();

                    if (data.success) {
                        document.querySelector(`#comment-${id}`).remove();
                    }
                });
            });
        });
    </script>
</x-layouts.layout>
