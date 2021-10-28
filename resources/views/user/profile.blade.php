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
                                            <small class="fw-light">{{ auth()->user()->email }}</small>
                                        </div>
                                        <hr>
                                        <nav class="nav flex-md-column mb-3">
                                            <a class="nav-link active" aria-current="page"
                                                href="{{ route('user.profile', ['id' => auth()->user()->id]) }}"><i
                                                    class="bi bi-person me-2" aria-hidden="true"></i>Profile</a>
                                            <a class="nav-link"
                                                href="{{ route('user.notification', ['id' => auth()->user()->id]) }}"><i
                                                    class="bi bi-bell me-2" aria-hidden="true"></i>Notification</a>
                                            <a class="nav-link" href="{{ route('user.event.upcoming', ['id' => auth()->user()->id]) }}"><i class="bi bi-calendar-range me-2"
                                                    aria-hidden="true"></i>Event</a>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <ul class="nav nav-pills my-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-personalinfo-tab"
                                                data-bs-toggle="pill" data-bs-target="#pills-personalinfo" type="button"
                                                role="tab" aria-controls="pills-personalinfo" aria-selected="true"><i
                                                    class="bi bi-person me-2" aria-hidden="true"></i>Personal Info</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-password-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-password" type="button" role="tab"
                                                aria-controls="pills-password" aria-selected="false"><i
                                                    class="bi bi-lock me-2" aria-hidden="true"></i>Change Password</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-language-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-language" type="button" role="tab"
                                                aria-controls="pills-language" aria-selected="false"><i
                                                    class="bi bi-globe me-2" aria-hidden="true"></i>Language</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-personalinfo" role="tabpanel"
                                            aria-labelledby="pills-personalinfo-tab">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="text-center">
                                                        <label class="form-label">Photo Profile</label>
                                                        <div class="avatar-lg mx-auto position-relative">
                                                            <img class="avatar-lg rounded-circle mb-2"
                                                                src="https://images.unsplash.com/photo-1582599782475-aaec4fbd1b02?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=388&q=80"
                                                                alt="...">
                                                            <a class="btn-photo" type="button" data-bs-toggle="modal"
                                                                data-bs-target="#modalUpload"><i class="bi bi-camera-fill"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <form>
                                                        <div class="mb-3">
                                                            <label for="InputName" class="form-label">Name</label>
                                                            <div class="input-group">
                                                                <span
                                                                    class="input-group-text bg-transparent text-secondary"><i
                                                                        class="bi bi-person"></i></span>
                                                                <input type="text" class="form-control border-start-0"
                                                                    id="InputName" placeholder="Full Name">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="InputEmail" class="form-label">Email
                                                                address</label>
                                                            <div class="input-group">
                                                                <span
                                                                    class="input-group-text bg-transparent text-secondary"><i
                                                                        class="bi bi-envelope"></i></span>
                                                                <input type="email" class="form-control border-start-0"
                                                                    id="InputEmail" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="InputPhone" class="form-label">Phone
                                                                Number</label>
                                                            <div class="input-group">
                                                                <span
                                                                    class="input-group-text bg-transparent text-secondary"><i
                                                                        class="bi bi-phone"></i></span>
                                                                <input type="number" class="form-control border-start-0"
                                                                    id="InputPhone" placeholder="Phone Number">
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-secondary float-end">Save
                                                            Change</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-password" role="tabpanel"
                                            aria-labelledby="pills-password-tab">
                                            <form class="row g-3 p-3">
                                                <div class="col-md-4">
                                                    <label for="InputPhone" class="form-label">Current Password</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-transparent text-secondary"><i
                                                                class="bi bi-key"></i></span>
                                                        <input type="password" class="form-control border-start-0"
                                                            id="InputPassword1" placeholder="Current Password">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="InputPassword3" class="form-label">New Password</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-transparent text-secondary"><i
                                                                class="bi bi-key"></i></span>
                                                        <input type="password" class="form-control border-start-0"
                                                            id="InputPassword3" placeholder="New Password">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="InputPassword3" class="form-label">Confirm
                                                        Password</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-transparent text-secondary"><i
                                                                class="bi bi-key"></i></span>
                                                        <input type="password" class="form-control border-start-0"
                                                            id="InputPassword3" placeholder="Confirm Password">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 offset-md-8">
                                                    <button type="submit" class="btn btn-secondary float-end">Save
                                                        Change</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="pills-language" role="tabpanel"
                                            aria-labelledby="pills-language-tab">
                                            <form class="row g-3 p-3">
                                                <div class="col-md-3 col-6">
                                                    <label class="form-check-label" for="bahasa1">
                                                        English (EN)
                                                    </label>
                                                </div>
                                                <div class="col-md-9 col-6">
                                                    <input class="form-check-input" type="radio" name="pilih-bahasa"
                                                        id="bahasa1" checked>
                                                </div>
                                                <div class="col-md-3 col-6">
                                                    <label class="form-check-label" for="bahasa2">
                                                        Bahasa (ID)
                                                    </label>
                                                </div>
                                                <div class="col-md-9 col-6">
                                                    <input class="form-check-input" type="radio" name="pilih-bahasa"
                                                        id="bahasa2">
                                                </div>
                                            </form>
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
