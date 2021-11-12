@extends('layouts.frontend')

@section('content')
    <section class="bg-gradient-secondary py-5">
        <div class="container">
            <h1 class="text-white">Our Service</h1>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <ul class="nav nav-pills my-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-user-tab" data-bs-toggle="pill" data-bs-target="#pills-user"
                        type="button" role="tab" aria-controls="pills-user" aria-selected="true">For User</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-sli-tab" data-bs-toggle="pill" data-bs-target="#pills-sli"
                        type="button" role="tab" aria-controls="pills-sli" aria-selected="false">For Sign Language
                        Interpreter</button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
                    <p>
                        We provide services to both deaf and non-deaf people (family, public servants and others) who want
                        to find a sign language interpreter to communicate. We provide many options according to your needs
                        and conditions.
                        Choose the sign language interpreter you want and discuss the price that suits your budget with
                        them.
                    </p>
                    <div class="text-center">
                        <a href="{{ route('partner.index') }}" class="btn btn-outline-primary">Find a sign interpreter</a>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-sli" role="tabpanel" aria-labelledby="pills-sli-tab">
                    <p>
                        We provide opportunities for people who have the capacity to translate sign language to join us. To
                        ensure the qualification of sign language interpreters, we work closely with the Yogyakarta Sign
                        Language Interpreter Service Center (PLJ).
                    </p>
                    <div class="text-center">
                        <a href="{{ env('APP_PARTNER_URL') }}" class="btn btn-outline-primary">Join as interpreter</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
