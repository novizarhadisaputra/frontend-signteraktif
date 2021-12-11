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
                                                src="{{ auth()->user()->image->url ?? asset('assets/img/no-photo.jpg') }}"
                                                alt="...">
                                            <p class="mb-0">
                                                <span class="fw-bold">{{ auth()->user()->name }}</span>
                                            </p>
                                            <small class="fw-light">{{ auth()->user()->email }}</small>
                                        </div>
                                        <hr>
                                        <nav class="nav flex-md-column mb-3">
                                            <a class="nav-link"
                                                href="{{ route('user.profile', ['id' => auth()->user()->id]) }}"><i
                                                    class="bi bi-person me-2" aria-hidden="true"></i>Profile</a>
                                            <a class="nav-link active" aria-current="page" href="{{ route('user.notification', ['id' => auth()->user()->id]) }}"><i
                                                    class="bi bi-bell me-2" aria-hidden="true"></i>Notification</a>
                                            <a class="nav-link" href="{{ route('user.event.upcoming', ['id' => auth()->user()->id]) }}"><i class="bi bi-calendar-range me-2"
                                                    aria-hidden="true"></i>Event</a>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <p class="h2 m-3">Notification</p>
                                    <div class="list-group list-group-flush">
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-sm rounded-circle bg-warning"></div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h4 class="mb-1">Reminder</h4>
                                                        <small>1 minutes ago</small>
                                                    </div>
                                                    <p class="small mb-1">1 hour until your event with JBI Alexandra
                                                        starts</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-sm rounded-circle bg-info"></div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h4 class="mb-1">Order JBI</h4>
                                                        <small>3 minutes ago</small>
                                                    </div>
                                                    <p class="small mb-1">You managed to make an appointment with a JBI
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-sm rounded-circle bg-danger"></div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h4 class="mb-1">Appointment Canceled</h4>
                                                        <small>3 days ago</small>
                                                    </div>
                                                    <p class="small mb-1">Your appointment has been canceled by Putra
                                                        Siregar</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-sm rounded-circle bg-success"></div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h4 class="mb-1">Finished</h4>
                                                        <small>1 weeks ago</small>
                                                    </div>
                                                    <p class="small mb-1">Your event with JBI Mahmudin has been carried
                                                        out and is finished</p>
                                                </div>
                                            </div>
                                        </a>
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
