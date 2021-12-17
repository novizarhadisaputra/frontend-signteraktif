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
                        type="button" role="tab" aria-controls="pills-user" aria-selected="true">Untuk Pengguna</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-sli-tab" data-bs-toggle="pill" data-bs-target="#pills-sli"
                        type="button" role="tab" aria-controls="pills-sli" aria-selected="false">Untuk Penerjemah Bahasa isyarat
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
                    <p>
                        Kami menyediakan layanan bagi penyandang tunarungu dan non-tunarungu (keluarga, pegawai negeri, dan
                        lain-lain) yang ingin mencari juru bahasa isyarat untuk berkomunikasi. Kami menyediakan banyak
                        pilihan sesuai kebutuhan dan kondisi Anda. Pilih juru bahasa isyarat yang Anda inginkan dan
                        diskusikan harga yang sesuai dengan anggaran Anda dengan mereka.
                    </p>
                    <div class="text-center">
                        <a href="{{ route('partner.index') }}" class="btn btn-outline-primary">Temuka juru bahasa
                            isyarat</a>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-sli" role="tabpanel" aria-labelledby="pills-sli-tab">
                    <p>
                        Kami memberikan kesempatan bagi orang-orang yang memiliki kapasitas untuk menerjemahkan bahasa
                        isyarat untuk bergabung dengan kami. Untuk memastikan kualifikasi juru bahasa isyarat, kami bekerja
                        sama dengan Pusat Layanan Juru Bahasa Isyarat (PLJ) ​​Yogyakarta.
                    </p>
                    <div class="text-center">
                        <a href="{{ env('APP_PARTNER_URL') }}" class="btn btn-outline-primary">Join as interpreter</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
