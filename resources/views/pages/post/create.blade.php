<x-layouts.layout title="Blog - Create Post">
    <!-- Page Header Start -->
    <x-page-header title="Single blog" />

    <!-- Page Header End -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0">
                <div class="contact-form">
                    <div id="success"></div>

                    <x-form-errors />
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-6 form-group">
                                <label for="title" class="font-weight-bold">Enter title:</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}"
                                    class="form-control p-4 mb-4" placeholder="Post Title" required="required"
                                    data-validation-required-message="Please enter title" />
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="description" class="font-weight-bold">Enter description:</label>
                                <input type="text" name="description" id="description"
                                    value="{{ old('description') }}" class="form-control p-4 mb-4"
                                    placeholder="Post Description" required="required"
                                    data-validation-required-message="Please enter description" />

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="photo" class="font-weight-bold">Choose a photo:</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="photo" name="photo" required>
                                <label class="custom-file-label" for="photo">Choose file...</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="font-weight-bold">Enter post content:</label>
                            <textarea class="form-control p-4 mb-4" name="content" id="contet" rows="6" placeholder="Post Content"
                                required="required" data-validation-required-message="Please enter content">{{ old('content') }}</textarea>
                        </div>


                        <div class="form-group">
                            <label for="category_id" class="font-weight-bold">Choose a category:</label>
                            <select name="category_id" id="category_id" class="custom-select" required>
                                <option value="">-- Choose a category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tags" class="font-weight-bold">Select Tags:</label>
                            <select name="tags[]" id="tags" class="custom-select" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Hold <kbd>Ctrl</kbd> (Windows) or <kbd>Cmd</kbd> (Mac)
                                to select multiple</small>
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
