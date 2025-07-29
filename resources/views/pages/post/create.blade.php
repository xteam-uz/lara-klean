<x-layouts.layout title="Blog - Create Post">
    <!-- Page Header Start -->
    <x-page-header title="Single blog" />

    <!-- Page Header End -->
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
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-6 control-group">
                                <input type="text" name="title" value="{{ old('title') }}"
                                    class="form-control p-4 mb-4" placeholder="Post Title" required="required"
                                    data-validation-required-message="Please enter title" />
                            </div>
                            <div class="col-sm-6 control-group">
                                <input type="text" name="description" value="{{ old('description') }}"
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
                                data-validation-required-message="Please enter content">{{ old('content') }}</textarea>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-block py-3 px-5" type="submit"
                                id="sendMessageButton">Create post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>
