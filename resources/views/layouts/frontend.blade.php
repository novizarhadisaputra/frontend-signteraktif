<!DOCTYPE html>
<html lang="en">

@include('components.head')

<body>
    @include('components.toast')

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
    @include('components.modal-forgot-password')

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
