@extends('layouts.frontend')
@section('content')
    <section class="bg-gradient-secondary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="text-center text-md-start py-5">
                        <h1 class="display-4 text-white fw-bold mb-4">Find a Sign Interpreter Here </h1>
                        <p class="text-white">Now looking for a sign language interpreter, you can just lay down
                            by opening the website or downloading the signteraktif application, you can find a sign
                            language interpreter.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-end py-md-5">
                        <img src="assets/img/illustration1.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="card mt-2 mb-5">
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('partner.index') }}">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent text-secondary border-0"><i
                                                class="bi bi-geo-alt"></i></span>
                                        <select class="form-select border-0 border-end rounded-0" name="province" id="province">
                                            <option value="All">All Location</option>
                                            <option value="Yogyakarta">Yogyakarta</option>
                                            <option value="Boyolali">Boyolali</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent text-secondary border-0"><i
                                                class="bi bi-calendar"></i></span>
                                        <input type="date" name="date" class="form-control border-0 border-end rounded-0"
                                            id="InputLocation" placeholder="Choose Date" value="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary w-100">Find a sign
                                        interpreter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.list-partner', ['partners' => $partners])

    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="text-center text-md-start py-5">
                        <h2 class="h1 mb-4">What is <span class="text-secondary">Signteraktif</span></h2>
                        <p>Signteraktif is an on-demand service that provides accessible communication between deaf
                            friends and hearing people who are in the same location, using an interpreter through a
                            gadget (mobile, tablet or laptop or computer PC) that has a camera and uses an internet
                            connection.</p>
                        <p> Signteractive answers the practical need for accessible public services. Such as
                            transactions with customer service, health control, meetings and much more. Signteraktif
                            can be used on Android, IOS systems.</p>
                        <a class="btn btn-outline-primary my-5 px-5" href="#">More</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-end pt-5">
                        <img src="{{ asset('assets/img/illustration2.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="h1 my-md-5"> Why Signteraktif ?</h2>
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <img src="assets/img/vector1.svg" class="img-fluid mb-4" alt="">
                            <h3 class="mb-3">Easy and fast</h3>
                            <p>Easy to find and contact sign language interpreter</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <img src="assets/img/vector2.svg" class="img-fluid mb-4" alt="">
                            <h3 class="mb-3">Real time</h3>
                            <p>Communicate directly through the Interpreter</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <img src="assets/img/vector3.svg" class="img-fluid mb-4" alt="">
                            <h3 class="mb-3">On-Demand Service</h3>
                            <p>Adjusting the needs of the deaf either directly, scheduled or dialect choice.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <img src="assets/img/vector4.svg" class="img-fluid mb-4" alt="">
                            <h3 class="mb-3">Provides many choices</h3>
                            <p>You can choose JBI according to the needs of the situation (online or on site)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gradient-secondary py-5">
        <div class="container">
            <h2 class="h1 mb-5 text-white text-center"> Our service </h2>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card border-0 bg-secondary-dark h-100 mb-4">
                        <div class="card-body p-5">
                            <h3 class="text-white mb-3">For User</h3>
                            <p class="text-white ">We provide services to both deaf and non-deaf people (family,
                                public servants and others) who want to find a sign language interpreter to
                                communicate. We provide many options according to your needs and conditions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card border-0 bg-secondary-dark h-100 mb-4">
                        <div class="card-body p-5">
                            <h3 class="text-white mb-3">For sign Language Interpreter</h3>
                            <p class="text-white ">We provide opportunities for people who have the capacity to
                                translate sign language to join us. To ensure the qualification of sign language
                                interpreters, we work closely with the Yogyakarta Sign Language Interpreter Service
                                Center (PLJ). </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="h1 mb-5 text-center text-md-start"> Need a help ? </h2>
            <div class="card border-0 bg-dark bg-opacity-25">
                <div class="card-body p-5">
                    <form class="row g-3">
                        <div class="col-md-5">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-white text-secondary"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control border-start-0" id="InputLocation"
                                    placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-white text-secondary"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control border-start-0" id="InputLocation"
                                    placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Contact Us</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="h1 mb-5 text-center"> Our Partners </h2>
            <div class="row justify-content-center">
                <div class="col col-md-2">
                    <img src="assets/img/logo-partner1.png" class="img-fluid my-4" alt="">
                </div>
                <div class="col col-md-2">
                    <img src="assets/img/logo-partner2.png" class="img-fluid my-4" alt="">
                </div>
                <div class="col col-md-2">
                    <img src="assets/img/logo-partner3.png" class="img-fluid my-4" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gradient-secondary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="text-center text-md-start py-5">
                        <h6 class="display-6 text-white fw-bold mb-4">Download Aplikasi Signteraktif Sekarang !
                        </h6>
                    </div>
                    <div class="text-center text-md-start pb-5">
                        <a href="#"><img src="assets/img/ic-playstore.png" height="50" alt=""></a>
                        <a href="#"><img src="assets/img/ic-appstore.png" height="50" alt=""></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-end">
                        <img src="assets/img/illustration3.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>

    </script>
@endsection
