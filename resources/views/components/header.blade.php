<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 bg-secondary d-none d-lg-block">
            <a href="" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 display-3 text-primary">Klean</h1>
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row bg-dark d-none d-lg-flex">
                <div class="col-lg-7 text-left text-white">
                    <div class="h-100 d-inline-flex align-items-center border-right border-primary py-2 px-3">
                        <i class="fa fa-envelope text-primary mr-2"></i>
                        <small>info@example.com</small>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2 px-2">
                        <i class="fa fa-phone-alt text-primary mr-2"></i>
                        <small>+012 345 6789</small>
                    </div>
                </div>
                <div class="col-lg-5 text-right">
                    <div class="d-inline-flex align-items-center pr-2">
                        <a class="text-primary p-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-primary p-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-primary p-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-primary p-2" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-primary p-2" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
                <a href="" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 display-4 text-primary">Klean</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{ route('main') }}" class="nav-item nav-link">Home</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                        <a href="{{ route('service') }}" class="nav-item nav-link">Service</a>
                        <a href="{{ route('project') }}" class="nav-item nav-link">Project</a>
                        <a href="{{ route('posts.index') }}" class="nav-item nav-link">Post</a>
                        <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                    </div>
                    @auth
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                    id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fas fa-user-circle fa-lg text-primary mr-2"></i>
                                    <span class="font-weight-bold">{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="userDropdown">
                                    <a href="{{ route('posts.create') }}" class="dropdown-item">
                                        <i class="fas fa-plus mr-2 text-success"></i> Create Post
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    @else
                        <div class="d-flex">
                            <a href="{{ route('login') }}" class="btn btn-outline-primary mr-2">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                        </div>
                    @endauth
                </div>
            </nav>
        </div>
    </div>
</div>
