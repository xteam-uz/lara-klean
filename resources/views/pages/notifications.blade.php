<x-layouts.layout title="Contact">

    <!-- Page Header Start -->
    <x-page-header title="Contact" />
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-6">
                    <h1 class="section-title mb-3">Notifications</h1>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                    <form action="{{ route('notification.delete') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            Delete All Notifications
                        </button>
                    </form>
                </div>

            </div>
            <div class="row">
                @foreach ($notifications as $notification)
                    <div class="col-12 mb-5 mb-lg-0 d-flex justify-content-between">
                        <a href="{{ route('notification.read', $notification->data['id']) }}"
                            class="text-warning {{ $notification->read_at ? 'text-muted' : '' }}">
                            {{ $notification->data['id'] }}. {{ $notification->data['title'] }}
                        </a>
                        <p class="text-warning {{ $notification->read_at ? 'text-muted' : '' }}">
                            {{ $notification->created_at }}</p>
                    </div>
                @endforeach

                {{-- Pagination --}}
                <div class="col-12 w-100 max-600 mx-auto d-flex justify-content-center">
                    {{ $notifications->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</x-layouts.layout>
