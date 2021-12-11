<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="{{ route('root') }}">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" href="#MobileMenu" role="button"
                aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ isset($home) ? $home : '' }}" aria-current="page"
                            href="{{ route('root') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ isset($partner) ? $partner : '' }}" href="{{ route('partner.index') }}">Find Interpreter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ isset($about) ? $about : '' }}" href="{{ route('about-us') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ isset($service) ? $service : '' }}" href="{{ route('service') }}">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ isset($how) ? $how : '' }}" href="{{ route('how-to-use') }}">How To Use</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ isset($contact) ? $contact : '' }}" href="{{ route('contact-us') }}">Contact Us</a>
                    </li>
                </ul>
                @if (auth()->user())
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-light d-flex align-items-center" href="#"
                                id="menuProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome, <span class="mx-1 fw-bold ellipsis">{{ auth()->user()->name }}</span>
                                <img class="avatar-sm rounded-circle"
                                    src="{{ auth()->user()->image->url ?? asset('assets/img/no-photo.jpg') }}"
                                    alt="...">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end border-0 p-4 h5 shadow"
                                aria-labelledby="menuProfile">
                                <li>
                                    <div class="text-center">
                                        <img class="avatar-md rounded-circle"
                                            src="{{ auth()->user()->image->url ?? asset('assets/img/no-photo.jpg') }}"
                                            alt="...">
                                        <div class="my-2">{{ auth()->user()->name }}</div>
                                        <small class="fw-light">{{ auth()->user()->email }}</small>
                                    </div>
                                    <a href="{{ route('user.show', ['user' => auth()->user()->id]) }}"
                                        class="btn btn btn-sm btn-primary w-100 my-2">Set Profile</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('user.event.upcoming', ['id' => auth()->user()->id]) }}">Upcoming
                                        Event</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('user.event.booking', ['id' => auth()->user()->id]) }}">List
                                        order</a></li>
                                <li><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="dropdown-item text-center btn btn-sm btn-outline-danger mt-3"
                                        href="{{ route('logout') }}">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown ms-2">
                            <a class="nav-link" href="#" id="menuNotif" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-bell h3" aria-hidden="true">
                                    {{-- <span data-notif-items="4"></span> --}}
                                </i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end border-0 shadow menu-notif"
                                aria-labelledby="menuNotif">
                                <p class="h2 m-3">Notification</p>
                                <div class="list-group list-group-flush">
                                    {{-- <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-sm rounded-circle bg-warning"></div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h4 class="mb-1">Reminder</h4>
                                                    <small>1 minutes ago</small>
                                                </div>
                                                <p class="small mb-1">1 hour until your event with JBI Alexandra
                                                    starts</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-sm rounded-circle bg-info"></div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h4 class="mb-1">Order JBI</h4>
                                                    <small>3 minutes ago</small>
                                                </div>
                                                <p class="small mb-1">You managed to make an appointment with a JBI
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-sm rounded-circle bg-danger"></div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h4 class="mb-1">Appointment Canceled</h4>
                                                    <small>3 days ago</small>
                                                </div>
                                                <p class="small mb-1">Your appointment has been canceled by Putra
                                                    Siregar</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-sm rounded-circle bg-success"></div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h4 class="mb-1">Finished</h4>
                                                    <small>1 weeks ago</small>
                                                </div>
                                                <p class="small mb-1">Your event with JBI Mahmudin has been carried
                                                    out and is finished</p>
                                            </div>
                                        </div>
                                    </a> --}}
                                </div>
                                {{-- <a class="dropdown-item text-center text-primary mt-3" href="notif.html">See All</a> --}}
                            </div>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalSignup">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#modalSignin">Sign In</button>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</header>
