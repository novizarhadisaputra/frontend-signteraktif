@extends('layouts.frontend')

@section('content')
    <section class="bg-gradient-secondary py-5">
        <div class="container">
            <h1 class="text-white">About Us</h1>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="text-center text-md-end pt-5">
                        <img src="{{ asset('assets/img/illustration2.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-start py-5">
                        <h2 class="h1 mb-4">What is <span class="text-secondary">Signteraktif</span></h2>
                        <p>Signteraktif is an on-demand service that provides accessible communication between deaf friends
                            and hearing people who are in the same location, using an interpreter through a gadget (mobile,
                            tablet or laptop or computer PC) that has a camera and uses an internet connection.</p>
                        <p> Signteractive answers the practical need for accessible public services. Such as transactions
                            with customer service, health control, meetings and much more. Signteraktif can be used on
                            Android, IOS systems.</p>
                        <a class="btn btn-primary my-5 px-5" href="{{ route('partner.index') }}">Find a sign
                            interpreter</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
