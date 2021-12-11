@extends('layouts.frontend')
@section('content')
    <section>
        <div class="container">
            <div class="card my-5">
                <div class="card-body">
                    <form class="row g-3" action="{{ route('partner.index') }}">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-transparent text-secondary border-0"><i
                                        class="bi bi-geo-alt"></i></span>
                                <select class="form-select border-0 border-end rounded-0" name="province" id="province">
                                    <option value="">All Location</option>
                                    <option value="Yogyakarta"
                                        {{ request()->input('province') ? (request()->input('province') == 'Yogyakarta' ? 'selected' : '') : '' }}>
                                        Yogyakarta</option>
                                    <option value="Boyolali"
                                        {{ request()->input('province') ? (request()->input('province') == 'Boyolali' ? 'selected' : '') : '' }}>
                                        Boyolali</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-transparent text-secondary border-0"><i
                                        class="bi bi-calendar"></i></span>
                                <input type="date" class="form-control border-0 border-end rounded-0" name="date" id="date"
                                    placeholder="Choose Date" value="{{ request()->input('date') ?? date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary w-100">Find a sign interpreter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @php
    $province = request()->input('province') ? request()->input('province') : '';
    $date = request()->input('province') ? request()->input('province') : date('Y-m-d');
    $allSex = route('partner.index') . '?province=' . $province . '&date=' . $date . '&sex=All';
    $male = route('partner.index') . '?province=' . $province . '&date=' . $date . '&sex=Man';
    $female = route('partner.index') . '?province=' . $province . '&date=' . $date . '&sex=Woman';
    @endphp

    <section>
        <div class="container">
            <h2 class="h3 mb-4">List of interpreters</h2>
            <div class="row mb-4">
                <div class="col-md-10 col-7">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->input('sex') ? (request()->input('sex') == 'All' ? 'active' : '') : 'active' }}"
                                aria-current="page" href="{{ $allSex }}">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->input('sex') == 'Man' ? 'active' : '' }}"
                                href="{{ $male }}">Male</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->input('sex') == 'Woman' ? 'active' : '' }}"
                                href="{{ $female }}">Female</a>
                        </li>
                    </ul>
                </div>
                {{-- <div class="col-md-2 col-5">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent text-secondary"><i class="bi bi-sort-down"></i></span>
                        <select class="form-select border-start-0" id="InputMonth">
                            <option value="1">Popular</option>
                            <option value="2">Newest</option>
                            <option value="3">Oldest</option>
                        </select>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                @forelse ($schedules as $schedule)
                    <div class="col-md-3 col-6">
                        <div class="person-card mb-4">
                            <div class="position-relative img-hover-zoom ">
                                <a class="person-contact" href="#">
                                    <span class="badge badge rounded-pill bg-light text-dark h5"><i
                                            class="bi bi-chat-dots-fill text-secondary mx-1" aria-hidden="true"></i>
                                        Contact</span>
                                </a>
                                <a type="button" data-bs-toggle="modal"
                                    data-bs-target="#modalPerson{{ $schedule->user->id }}">
                                    <img src="{{ $schedule->user->image->url ?? asset('assets/img/no-photo.jpg') }}"
                                        alt="{{ $schedule->user->name }}">
                                    <div class="overlay"></div>
                                </a>
                            </div>
                            <div class="person-detail">
                                <h2 class="text-white person-title">{{ $schedule->user->name }}</h2>
                                <div class="mb-2">
                                    <span class="small text-white">
                                        <i class="bi bi-geo-alt mx-1" aria-hidden="true"></i>
                                        {{ $schedule->user->detail->city ? ($schedule->user->detail->city . ', ' . $schedule->user->detail->province) : 'Indonesia' }}
                                    </span>
                                </div>
                                <div class="mb-2">
                                    <span class="small text-white">
                                        <i class="bi bi-cash mx-1" aria-hidden="true"></i> Rp.
                                        {{ number_format($schedule->price, 0, ',', '.') }}
                                        {{ "($schedule->time_start - $schedule->time_end)" }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('components.modal-partner', ['partner' => $schedule->user])
                @empty

                @endforelse
            </div>
        </div>
    </section>

    <section class="bg-gradient-secondary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="text-center text-md-start py-5">
                        <h6 class="display-6 text-white fw-bold mb-4">Download Aplikasi Signteraktif Sekarang !</h6>
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
