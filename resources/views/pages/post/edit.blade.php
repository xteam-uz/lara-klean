<x-layouts.layout title="Blog - {{ $post->title }}">
    <!-- Page Header Start -->
    <x-page-header title="{{ $post->title }}" message="Updated post:" />
    <!-- Page Header End -->

    <!-- Blog Details Start -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0">
                <div class="contact-form">
                    <div id="success"></div>

                    <x-form-errors />
                    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="title">Post Title</label>
                                <input type="text" name="title" id="title"
                                    value="{{ old('title', $post->title) }}" class="form-control p-4 mb-3"
                                    placeholder="Enter post title" required>
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="description">Post Description</label>
                                <input type="text" name="description" id="description"
                                    value="{{ old('description', $post->description) }}" class="form-control p-4 mb-3"
                                    placeholder="Enter post description" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="photo">Post Image</label>
                            <div class="custom-file mb-3">
                                <input type="file" name="photo" id="photo" class="custom-file-input">
                                <label class="custom-file-label" for="photo">Choose file</label>
                            </div>
                            @if ($post->photo)
                                <small class="form-text text-muted">
                                    Current image: <strong>{{ $post->photo }}</strong>
                                </small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="content">Post Content</label>
                            <textarea class="form-control p-4 mb-3" name="content" id="content" rows="6" placeholder="Enter post content"
                                required>{{ old('content', $post->content) }}</textarea>
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <button class="btn btn-success py-2 px-4" type="submit">Update Post</button>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger py-2 px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layouts.layout>
