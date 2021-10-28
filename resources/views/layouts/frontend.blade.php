<!DOCTYPE html>
<html lang="en">

@include('components.head')

<body>
    @if (request()->session()->has('error'))
        <div class="toast-container position-absolute" style="z-index: 12; top: 5rem; right:5rem;">
            <div class="toast fade alert-danger show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ request()->session()->get('error') }}
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @elseif (request()->session()->has('success'))
        <div class="toast-container position-absolute" style="z-index: 12; top: 5rem; right:5rem;">
            <div class="toast fade alert-success show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ request()->session()->get('success') }}
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="toast-container position-absolute" style="z-index: 12; top: 5rem; right:5rem;">
            @foreach ($errors->all() as $error)
                <div class="toast fade alert-warning show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ $error }}
                        </div>
                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Mobile Menu -->
    @include('components.drawer')
    <!-- End Mobile Menu -->
    @include('components.header')
    <main>
        @yield('content')
    </main>
    @include('components.footer')
    @include('components.modal-signin')
    @include('components.modal-signup')

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Main -->
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
    <!-- Init -->
    @yield('scripts')
    <!-- Owl Carousel -->
    <script type="text/javascript" src="{{ asset('assets/vendor/owlcarousel/owl.carousel.min.js') }}"></script>
    <!-- Main -->
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
    <!-- Init -->
    <script type="text/javascript">
        $('#UpcomingSlider').owlCarousel({
            center: true,
            loop: true,
            margin: 20,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                1000: {
                    items: 2
                }
            }
        })
    </script>
</body>

</html>
