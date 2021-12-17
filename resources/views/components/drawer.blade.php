@if (auth()->user())
    <!-- Mobile Menu -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="MobileMenu" aria-labelledby="MobileMenuLabel">
        <div class="offcanvas-header">
            <h5></h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a class="navbar-brand" href="{{ route('root') }}">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="">
            </a>
            <nav class="nav flex-column p-4 side-menu">
                <ul class="list-unstyled mb-0 py-3 pt-md-1">
                    <li class="mb-3">
                        <div>
                            <img class="avatar-md rounded-circle mb-2"
                                src="{{ auth()->user()->image->url ?? asset('assets/img/no-photo.jpg') }}" alt="...">
                            <p>
                                Welcome, <span class="fw-bold">{{ auth()->user()->name }}</span>
                                <a href="">
                                    <i class="bi bi-bell h3" aria-hidden="true">
                                        <span data-notif-items="4"></span>
                                    </i>
                                </a>
                            </p>
                        </div>
                    </li>
                    <li class="mb-3">
                        <a class="p-2" aria-current="page" href="{{ route('root') }}">Beranda</a>
                    </li>
                    <li class="mb-3">
                        <a class="p-2" href="{{ route('partner.index') }}">Temukan Penerjemah</a>
                    </li>
                    <li class="mb-3">
                        <a class="p-2" href="{{ route('about-us') }}">Tentang Kami</a>
                    </li>
                    <li class="mb-3">
                        <a class="p-2" href="{{ route('service') }}">Layanan</a>
                    </li>
                    <li class="mb-3">
                        <a class="p-2" href="{{ route('how-to-use') }}">Cara Penggunaan</a>
                    </li>
                    <li class="mb-3">
                        <a class="p-2" href="{{ route('contact-us') }}">Hubungi Kami</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End Mobile Menu -->

@else
    <div class="offcanvas offcanvas-start" tabindex="-1" id="MobileMenu" aria-labelledby="MobileMenuLabel">
        <div class="offcanvas-header">
            <h5></h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a class="navbar-brand" href="{{ route('root') }}">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="">
            </a>
            <nav class="nav flex-column p-4 side-menu">
                <ul class="list-unstyled mb-0 py-3 pt-md-1">
                    <li class="mb-3">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-outline-primary w-50 me-2" data-bs-toggle="modal"
                                data-bs-target="#modalSignup">Daftar</button>

                            <button class="btn btn-outline-secondary w-50 ms-2" data-bs-toggle="modal"
                                data-bs-target="#modalSignin">Masuk</button>
                        </div>

                    </li>
                    <li class="mb-3">
                        <a class="p-2" aria-current="page" href="{{ route('root') }}">Beranda</a>
                    </li>
                    <li class="mb-3">
                        <a class="p-2" href="{{ route('partner.index') }}">Temukan Penerjemah</a>
                    </li>
                    <li class="mb-3">
                        <a class="p-2" href="{{ route('about-us') }}">Tentang Kami</a>
                    </li>
                    <li class="mb-3">
                        <a class="p-2" href="{{ route('service') }}">Layanan</a>
                    </li>
                    <li class="mb-3">
                        <a class="p-2" href="{{ route('how-to-use') }}">Cara Penggunaan</a>
                    </li>
                    <li class="mb-3">
                        <a class="p-2" href="{{ route('contact-us') }}">Hubungi Kami</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endif
