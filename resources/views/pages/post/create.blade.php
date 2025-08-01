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

                        <div class="control-group">
                            <label for="category_id">Choose a category:</label>

                            <select name="category_id" id="category_id" required>
                                <option value="">-- Choose a category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="control-group">
                            <label class="block">
                                <span class="text-gray-700">Tag</span>
                                <select name="tags[]" class="block w-full mt-1" multiple>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </label>
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

<script>
    var textarea = document.querySelector('textarea[name=tags]');
    new Tagify(textarea, {
        whitelist: ['Laravel', 'PHP', 'Vue', 'React'], // ixtiyoriy takliflar
        dropdown: {
            enabled: 0 // 0 — yozilganda avtomatik ochilmaydi, 1 — harfi yozilganda taklif ochiladi
        }
    });
</script>
