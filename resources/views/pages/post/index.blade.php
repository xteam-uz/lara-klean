<x-layouts.layout title="Blog">
    <!-- Page Header Start -->
    <x-page-header title='Blog' />
    <!-- Page Header End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-6">
                    <h6 class="text-secondary font-weight-semi-bold text-uppercase mb-3">Latest Blog</h6>
                    <h1 class="section-title mb-3">Latest Articles From Our Blog Post</h1>
                </div>
                <div class="col-lg-6">
                    <h4 class="font-weight-normal text-muted mb-3">Eirmod kasd duo eos et magna, diam dolore stet sea
                        clita sit ea erat lorem. Ipsum eos ipsum magna lorem stet</h4>
                </div>
            </div>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="position-relative mb-4">
                            <img class="rounded w-100 post-fixed-img"
                                src="{{ $post->photo ? asset('storage/' . $post->photo) : 'https://www.dummyimage.com/300x200/000/fff' }}"
                                alt="{{ $post->title }}">
                            <div class="blog-date">
                                <h4 class="font-weight-bold mb-n1">{{ $post->created_at->format('d') }}</h4>
                                <small class="text-white text-uppercase">{{ $post->created_at->format('M') }}</small>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            @foreach ($post->tags as $tag)
                                <a class="text-secondary text-uppercase font-weight-medium"
                                    href="">{{ $tag->name }}</a>
                                @if (!$loop->last)
                                    <span class="text-primary px-2">|</span>
                                @endif
                            @endforeach
                        </div>

                        <div class="d-flex mb-2">
                            <a class="text-info text-uppercase font-weight-medium"
                                href="">{{ $post->category->name ?? 'No category' }}</a>
                        </div>

                        <h5 class="font-weight-medium mb-2">{{ $post->title }}</h5>
                        <p class="mb-4">{{ $post->description }}</p>
                        <a class="btn btn-sm btn-primary py-2"
                            href="{{ route('posts.show', ['post' => $post->id]) }}">Read More</a>
                    </div>
                @endforeach

                {{-- Pagination --}}
                <div class="col-12 w-100 max-600 mx-auto d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

</x-layouts.layout>
