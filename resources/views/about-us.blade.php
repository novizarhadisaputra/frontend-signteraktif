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
                        <h2 class="h1 mb-4">Apa itu <span class="text-secondary">Signteraktif</span></h2>
                        <p>Signteraktif adalah layanan on-demand yang menyediakan komunikasi yang dapat diakses antara teman
                            tunarungu dan tunarungu yang berada di lokasi yang sama, menggunakan juru bahasa melalui gadget
                            (ponsel, tablet atau laptop atau PC komputer) yang memiliki kamera dan menggunakan koneksi
                            internet.</p>
                        <p> Signteractive menjawab kebutuhan praktis akan layanan publik yang dapat diakses. Seperti
                            transaksi dengan customer service, health control, meeting dan masih banyak lagi. Signteraktif
                            dapat digunakan pada sistem Android, iOS.</p>
                        <a class="btn btn-primary my-5 px-5" href="{{ route('partner.index') }}">Temukan juru bahasa isyarat</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
