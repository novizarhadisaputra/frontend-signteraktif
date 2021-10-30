@extends('layouts.frontend')
@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card my-5">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 border-end">
                                    <div class="">
                                        <div class="p-2 text-center">
                                            <img class="avatar-md rounded-circle mb-2"
                                                src="{{ auth()->user()->image->url ?? asset('assets/img/default.png') }}"
                                                alt="...">
                                            <p class="mb-0">
                                                <span class="fw-bold">{{ auth()->user()->name }}</span>
                                            </p>
                                            <small class="fw-light">{{ auth()->user()->name }}</small>
                                        </div>
                                        <hr>
                                        <nav class="nav flex-md-column mb-3">
                                            <a class="nav-link"
                                                href="{{ route('user.profile', ['id' => auth()->user()->id]) }}"><i
                                                    class="bi bi-person me-2" aria-hidden="true"></i>Profile</a>
                                            <a class="nav-link"
                                                href="{{ route('user.notification', ['id' => auth()->user()->id]) }}"><i
                                                    class="bi bi-bell me-2" aria-hidden="true"></i>Notification</a>
                                            <a class="nav-link active" aria-current="page"
                                                href="{{ route('user.event.upcoming', ['id' => auth()->user()->id]) }}"><i
                                                    class="bi bi-calendar-range me-2" aria-hidden="true"></i>Event</a>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <ul class="nav nav-pills my-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link {{ $nav == 'upcoming' ? 'active' : '' }}"
                                                id="pills-upcoming-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-upcoming" type="button" role="tab"
                                                aria-controls="pills-upcoming" aria-selected="true">Upcoming Event</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link {{ $nav == 'booking' ? 'active' : '' }}"
                                                id="pills-listbooking-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-listbooking" type="button" role="tab"
                                                aria-controls="pills-listbooking" aria-selected="false">List
                                                Booking</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade {{ $nav == 'upcoming' ? ' show active' : '' }}"
                                            id="pills-upcoming" role="tabpanel" aria-labelledby="pills-upcoming-tab">
                                            <div class="my-4">
                                                @foreach ($upcomings as $upcoming)
                                                    <div class="card alert-{{ $upcoming->color_status }} mb-3">
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <div
                                                                        class="position-relative img-hover-zoom avatar-sm rounded-circle">
                                                                        <img class="avatar-sm"
                                                                            src="{{ $upcoming->details[0]->schedule->user->image->url ?? asset('assets/img/default.png') }}"
                                                                            alt="...">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-3 col-6">
                                                                            <div class="text-80">
                                                                                <p class="mb-0">Interpreter</p>
                                                                                <small
                                                                                    class="fw-bold">{{ $upcoming->details[0]->schedule->user->name }}</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3 col-6">
                                                                            <div class="text-80">
                                                                                <p class="mb-0">Date</p>
                                                                                <small
                                                                                    class="fw-bold">{{ date('d F Y', strtotime($upcoming->date)) }}</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3 col-6">
                                                                            <div class="text-80">
                                                                                <p class="mb-0">Time</p>
                                                                                <small
                                                                                    class="fw-bold">{{ $upcoming->details[0]->schedule->time_start }}
                                                                                    -
                                                                                    {{ $upcoming->details[0]->schedule->time_end }}
                                                                                    WIB</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3 col-6">
                                                                            <a
                                                                                href="https://wa.me/{{ $upcoming->user->phone }}/?text='Hello {{ $upcoming->user->name }}'">
                                                                                <span
                                                                                    class="badge badge rounded-pill bg-light text-dark h6"><i
                                                                                        class="bi bi-chat-dots-fill text-secondary mx-1"
                                                                                        aria-hidden="true"></i>
                                                                                    Contact</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                {{-- <div class="card alert-warning mb-3">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <div
                                                                    class="position-relative img-hover-zoom avatar-sm rounded-circle">
                                                                    <img class="avatar-sm"
                                                                        src="https://images.unsplash.com/photo-1613338971583-57949e3523ed?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=465&q=80"
                                                                        alt="...">
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Interpreter</p>
                                                                            <small class="fw-bold">Lili Wang</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Date</p>
                                                                            <small class="fw-bold">18 Oktober
                                                                                2021</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Time</p>
                                                                            <small class="fw-bold">08:30 - 10.30
                                                                                WIB</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <a href="#">
                                                                            <span
                                                                                class="badge badge rounded-pill bg-light text-dark h6"><i
                                                                                    class="bi bi-chat-dots-fill text-secondary mx-1"
                                                                                    aria-hidden="true"></i> Contact</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card alert-warning mb-3">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <div
                                                                    class="position-relative img-hover-zoom avatar-sm rounded-circle">
                                                                    <img class="avatar-sm"
                                                                        src="https://images.unsplash.com/flagged/photo-1570597719736-be24aa7bf19a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=770&q=80"
                                                                        alt="...">
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Interpreter</p>
                                                                            <small class="fw-bold">Mas Jaya</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Date</p>
                                                                            <small class="fw-bold">19 Oktober
                                                                                2021</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Time</p>
                                                                            <small class="fw-bold">08:30 - 10.30
                                                                                WIB</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <a href="#">
                                                                            <span
                                                                                class="badge badge rounded-pill bg-light text-dark h6"><i
                                                                                    class="bi bi-chat-dots-fill text-secondary mx-1"
                                                                                    aria-hidden="true"></i> Contact</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="tab-pane fade {{ $nav == 'booking' ? ' show active' : '' }}"
                                            id="pills-listbooking" role="tabpanel" aria-labelledby="pills-listbooking-tab">
                                            <div class="my-4">
                                                @forelse ($transactions as $transaction)
                                                    <div class="card border-{{ $transaction->color_status }} mb-3">
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <div
                                                                        class="position-relative img-hover-zoom avatar-sm rounded-circle">
                                                                        <img class="avatar-sm"
                                                                            src="{{ $transaction->details[0]->schedule->user->image->url ?? asset('assets/img/default.png') }}"
                                                                            alt="...">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-3 col-6">
                                                                            <div class="text-80">
                                                                                <p class="mb-0">Interpreter</p>
                                                                                <small
                                                                                    class="fw-bold">{{ $transaction->details[0]->schedule->user->name }}</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3 col-6">
                                                                            <div class="text-80">
                                                                                <p class="mb-0">Date</p>
                                                                                <small
                                                                                    class="fw-bold">{{ date('d F Y', strtotime($transaction->details[0]->schedule->date)) }}</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3 col-6">
                                                                            <div class="text-80">
                                                                                <p class="mb-0">Time</p>
                                                                                <small
                                                                                    class="fw-bold">{{ $transaction->details[0]->schedule->time_start }}
                                                                                    -
                                                                                    {{ $transaction->details[0]->schedule->time_end }}
                                                                                    WIB</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3 col-6">
                                                                            <div class="text-80">
                                                                                <p class="mb-0">Status</p>
                                                                                <span
                                                                                    class="badge bg-{{ $transaction->color_status }}">{{ $transaction->status->name }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-end mt-3 pt-3 border-top">
                                                                <a class="btn btn-sm btn-outline-danger" type="button"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalCancel">Cancel</a>
                                                                <a href="{{ route('transaction.edit', ['transaction' => $transaction->id]) . '?date=' . $transaction->details[0]->schedule->date }}"
                                                                    class="btn btn-sm btn-outline-secondary">Reschedule</a>
                                                                <a href="{{ route('transaction.show', ['transaction' => $transaction->id]) . '?date=' . $transaction->details[0]->schedule->date }}"
                                                                    class="btn btn-sm btn-primary">Detail</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty

                                                @endforelse

                                                {{-- <div class="card border-success mb-3">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <div
                                                                    class="position-relative img-hover-zoom avatar-sm rounded-circle">
                                                                    <img class="avatar-sm"
                                                                        src="https://images.unsplash.com/photo-1611695434398-4f4b330623e6?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=435&q=80"
                                                                        alt="...">
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Interpreter</p>
                                                                            <small class="fw-bold">Tobias
                                                                                Contenamo</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Date</p>
                                                                            <small class="fw-bold">17 Oktober
                                                                                2021</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Time</p>
                                                                            <small class="fw-bold">08:30 - 10.30
                                                                                WIB</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Status</p>
                                                                            <span class="badge bg-success">Finished</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-end mt-3 pt-3 border-top">
                                                            <a href="detail.html" class="btn btn-sm btn-primary">Detail</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card border-success mb-3">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <div
                                                                    class="position-relative img-hover-zoom avatar-sm rounded-circle">
                                                                    <img class="avatar-sm"
                                                                        src="https://images.unsplash.com/photo-1611695434398-4f4b330623e6?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=435&q=80"
                                                                        alt="...">
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Interpreter</p>
                                                                            <small class="fw-bold">Tobias
                                                                                Contenamo</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Date</p>
                                                                            <small class="fw-bold">17 Oktober
                                                                                2021</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Time</p>
                                                                            <small class="fw-bold">08:30 - 10.30
                                                                                WIB</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Status</p>
                                                                            <span class="badge bg-success">Finished</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-end mt-3 pt-3 border-top">
                                                            <a href="detail.html" class="btn btn-sm btn-primary">Detail</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card border-danger mb-3">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <div
                                                                    class="position-relative img-hover-zoom avatar-sm rounded-circle">
                                                                    <img class="avatar-sm"
                                                                        src="https://images.unsplash.com/photo-1611695434398-4f4b330623e6?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=435&q=80"
                                                                        alt="...">
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Interpreter</p>
                                                                            <small class="fw-bold">Tobias
                                                                                Contenamo</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Date</p>
                                                                            <small class="fw-bold">17 Oktober
                                                                                2021</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Time</p>
                                                                            <small class="fw-bold">08:30 - 10.30
                                                                                WIB</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Status</p>
                                                                            <span class="badge bg-danger">Canceled</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-end mt-3 pt-3 border-top">
                                                            <a href="detail.html" class="btn btn-sm btn-primary">Detail</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card border-danger mb-3">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <div
                                                                    class="position-relative img-hover-zoom avatar-sm rounded-circle">
                                                                    <img class="avatar-sm"
                                                                        src="https://images.unsplash.com/photo-1611695434398-4f4b330623e6?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=435&q=80"
                                                                        alt="...">
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Interpreter</p>
                                                                            <small class="fw-bold">Tobias
                                                                                Contenamo</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Date</p>
                                                                            <small class="fw-bold">17 Oktober
                                                                                2021</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Time</p>
                                                                            <small class="fw-bold">08:30 - 10.30
                                                                                WIB</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="text-80">
                                                                            <p class="mb-0">Status</p>
                                                                            <span class="badge bg-danger">Canceled</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-end mt-3 pt-3 border-top">
                                                            <a href="detail.html" class="btn btn-sm btn-primary">Detail</a>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
