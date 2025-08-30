<x-layouts.auth>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card my-4">

                    <x-form-errors />
                    <form method="POST" action="{{ route('registerPost') }}"
                        class="card-body auth-cardbody-color p-lg-5 mb-0">
                        @csrf
                        <div class="text-center">
                            <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png"
                                class="img-fluid auth-profile-image-pic img-thumbnail rounded-circle my-3" width="200px"
                                alt="profile">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="name">
                        </div>


                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="email">
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" placeholder="password">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn auth-btn-color px-5 mb-5 w-100">
                                Register
                            </button>
                        </div>

                        <div id="emailHelp" class="form-text text-center mb-5 text-dark">
                            Registered?
                            <a class="auth-link" href="{{ route('login') }}" class="text-dark fw-bold">
                                Login
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-layouts.auth>
