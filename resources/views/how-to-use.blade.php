@extends('layouts.frontend')

@section('content')
    <section class="bg-gradient-secondary py-5">
        <div class="container">
            <h1 class="text-white">How to ?</h1>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <ul class="nav nav-pills my-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-using-tab" data-bs-toggle="pill" data-bs-target="#pills-using"
                        type="button" role="tab" aria-controls="pills-using" aria-selected="true">Using a Sign Language
                        Interpreter</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-become-tab" data-bs-toggle="pill" data-bs-target="#pills-become"
                        type="button" role="tab" aria-controls="pills-become" aria-selected="false">Become a Sign Language
                        Interpreter</button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-using" role="tabpanel" aria-labelledby="pills-using-tab">
                    <div class="row">
                        <div class="col-md-3 col-6 mb-3">
                            <div class="card border-0 h-100 bg-transparent">
                                <div class="card-body">
                                    <img src="{{ asset('assets/img/vector5.svg') }}" class="img-fluid mb-4" alt="">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <h1>01</h1>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p>Entering date, month and event type to search for an interpreter</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="card border-0 h-100 bg-transparent">
                                <div class="card-body">
                                    <img src="{{ asset('assets/img/vector6.svg') }}" class="img-fluid mb-4" alt="">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <h1>02</h1>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p>Choose the Interpreter, according to the schedule you want</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="card border-0 h-100 bg-transparent">
                                <div class="card-body">
                                    <img src="{{ asset('assets/img/vector7.svg') }}" class="img-fluid mb-4" alt="">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <h1>03</h1>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p>Wait for feedback from the interpreter regarding your proposed schedule</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="card border-0 h-100 bg-transparent">
                                <div class="card-body">
                                    <img src="{{ asset('assets/img/vector8.svg') }}" class="img-fluid mb-4" alt="">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <h1>04</h1>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p>The Interpreter will come or fill the event according to your proposed
                                                schedule</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('partner.index') }}" class="btn btn-outline-primary">Temuka juru bahasa isyarat</a>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-become" role="tabpanel" aria-labelledby="pills-become-tab">
                    <div class="row">
                        <div class="col-md-3 col-6 mb-3">
                            <div class="card border-0 h-100 bg-transparent">
                                <div class="card-body">
                                    <img src="{{ asset('assets/img/vector9.svg') }}" class="img-fluid mb-4" alt="">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <h1>01</h1>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p>Go to the registration page, click the button below </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="card border-0 h-100 bg-transparent">
                                <div class="card-body">
                                    <img src="{{ asset('assets/img/vector10.svg') }}" class="img-fluid mb-4" alt="">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <h1>02</h1>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p>Complete the data related to the application requirements to become JBI </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="card border-0 h-100 bg-transparent">
                                <div class="card-body">
                                    <img src="assets/img/vector11.svg" class="img-fluid mb-4" alt="">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <h1>03</h1>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p>After registration is confirmed, fill in your availability schedule data</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="card border-0 h-100 bg-transparent">
                                <div class="card-body">
                                    <img src="assets/img/vector12.svg" class="img-fluid mb-4" alt="">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <h1>04</h1>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p>Profile is active and will appear in the application, interested users will
                                                use your services</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{{ env('APP_PARTNER_URL') }}" class="btn btn-outline-primary">Join as interpreter</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
