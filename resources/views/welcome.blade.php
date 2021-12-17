@extends('layouts.frontend')
@section('content')
    <section class="bg-gradient-secondary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="text-center text-md-start py-5">
                        <h1 class="display-4 text-white fw-bold mb-4">Temukan Juru Bahasa Isyarat Di Sini </h1>
                        <p class="text-white">Sekarang mencari juru bahasa isyarat, Anda bisa berbaring dengan membuka
                            situs web atau mengunduh aplikasi signteraktif, Anda dapat menemukan juru bahasa isyarat.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-end py-md-5">
                        <img src="{{ asset('assets/img/illustration1.png') }}" class="img-fluid" alt="">
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
                                        <select class="form-select border-0 border-end rounded-0" name="province"
                                            id="province">
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

    @include('components.list-partner', ['schedules' => $schedules])
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
                        <p>Signteractive menjawab kebutuhan praktis akan layanan publik yang dapat diakses. Seperti
                            transaksi dengan customer service, health control, meeting dan masih banyak lagi. Signteraktif
                            dapat digunakan pada sistem Android, iOS.</p>
                        <a class="btn btn-outline-primary my-5 px-5" href="{{ route('about-us') }}">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="h1 my-md-5">Mengapa Signeraktif ?</h2>
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <img src="{{ asset('assets/img/vector1.svg') }}" class="img-fluid mb-4" alt="">
                            <h3 class="mb-3">Mudah dan cepat</h3>
                            <p>Mudah untuk menemukan dan menghubungi juru bahasa isyarat</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <img src="{{ asset('assets/img/vector2.svg') }}" class="img-fluid mb-4" alt="">
                            <h3 class="mb-3">Waktu sebenarnya</h3>
                            <p>Berkomunikasi langsung melalui juru bahasa isyarat</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <img src="{{ asset('assets/img/vector3.svg') }}" class="img-fluid mb-4" alt="">
                            <h3 class="mb-3">Layanan Sesuai Permintaan</h3>
                            <p>Menyesuaikan kebutuhan tunarungu baik secara langsung, terjadwal maupun pilihan dialek.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <img src="{{ asset('assets/img/vector4.svg') }}" class="img-fluid mb-4" alt="">
                            <h3 class="mb-3">Menyediakan banyak pilihan</h3>
                            <p>Anda dapat memilih JBI sesuai dengan kebutuhan situasi (online atau on site)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gradient-secondary py-5">
        <div class="container">
            <h2 class="h1 mb-5 text-white text-center">Layanan kami</h2>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card border-0 bg-secondary-dark h-100 mb-4">
                        <div class="card-body p-5">
                            <h3 class="text-white mb-3">Untuk Pengguna</h3>
                            <p class="text-white ">Kami menyediakan layanan bagi penyandang tunarungu dan non-tunarungu
                                (keluarga, pegawai negeri, dan lain-lain) yang ingin mencari juru bahasa isyarat untuk
                                berkomunikasi. Kami menyediakan banyak pilihan sesuai kebutuhan dan kondisi Anda.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card border-0 bg-secondary-dark h-100 mb-4">
                        <div class="card-body p-5">
                            <h3 class="text-white mb-3">Untuk Penerjemah Bahasa isyarat</h3>
                            <p class="text-white ">Kami memberikan kesempatan bagi orang-orang yang memiliki kapasitas
                                untuk menerjemahkan bahasa isyarat untuk bergabung dengan kami. Untuk memastikan kualifikasi
                                juru bahasa isyarat, kami bekerja sama dengan Pusat Layanan Juru Bahasa Isyarat (PLJ)
                                Yogyakarta.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="h1 mb-5 text-center text-md-start">Butuh bantuan?</h2>
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
                                    placeholder="Nama">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Hubungi Kami</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="h1 mb-5 text-center">Mitra Kami</h2>
            <div class="row justify-content-center">
                <div class="col col-md-2">
                    <img src="{{ asset('assets/img/logo-partner1.png') }}" class="img-fluid my-4" alt="">
                </div>
                <div class="col col-md-2">
                    <img src="{{ asset('assets/img/logo-partner2.png') }}" class="img-fluid my-4" alt="">
                </div>
                <div class="col col-md-2">
                    <img src="{{ asset('assets/img/logo-partner3.png') }}" class="img-fluid my-4" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gradient-secondary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="text-center text-md-start py-5">
                        <h6 class="display-6 text-white fw-bold mb-4">Unduh Aplikasi Signteraktif Sekarang !
                        </h6>
                    </div>
                    <div class="text-center text-md-start pb-5">
                        <a href="#"><img src="{{ asset('assets/img/ic-playstore.png') }}" height="50" alt=""></a>
                        <a href="#"><img src="{{ asset('assets/img/ic-appstore.png') }}" height="50" alt=""></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-end">
                        <img src="{{ asset('assets/img/illustration3.png') }}" class="img-fluid" alt="">
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
