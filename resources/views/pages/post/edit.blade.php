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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-6 control-group">
                                <input type="text" name="title" value="{{ $post->title }}"
                                    class="form-control p-4 mb-4" placeholder="Post Title" required="required"
                                    data-validation-required-message="Please enter title" />
                            </div>
                            <div class="col-sm-6 control-group">
                                <input type="text" name="description" value="{{ $post->description }}"
                                    class="form-control p-4 mb-4" placeholder="Post Description" required="required"
                                    data-validation-required-message="Please enter description" />
                            </div>
                        </div>
                        <div class="control-group">
                            <input type="file" name="photo"
                                class="form-control px-4
                                mb-4"
                                placeholder="Post Image" />
                        </div>
                        <div class="control-group">
                            <textarea class="form-control p-4 mb-4" name="content" rows="6" placeholder="Post Content" required="required"
                                data-validation-required-message="Please enter content">
                                {{ $post->content }}
                              </textarea>
                        </div>
                        <div class="form-group d-flex justify-content-between align-items-center">
                            <button class="btn btn-success py-3 px-5" type="submit" id="sendMessageButton">Update
                                post</button>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger py-3 px-5 m-0"
                                type="submit" id="sendMessageButton">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layouts.layout>
