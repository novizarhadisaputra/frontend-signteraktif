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
                                                src="{{ $user->image->url ?? asset('assets/img/no-photo.jpg') }}"
                                                alt="...">
                                            <p class="mb-0">
                                                <span class="fw-bold">{{ $user->name }}</span>
                                            </p>
                                            <small class="fw-light">{{ $user->email }}</small>
                                        </div>
                                        <hr>
                                        <nav class="nav flex-md-column mb-3">
                                            <a class="nav-link active" aria-current="page"
                                                href="{{ route('user.profile', ['id' => $user->id]) }}"><i
                                                    class="bi bi-person me-2" aria-hidden="true"></i>Profile</a>
                                            <a class="nav-link"
                                                href="{{ route('user.notification', ['id' => $user->id]) }}"><i
                                                    class="bi bi-bell me-2" aria-hidden="true"></i>Notification</a>
                                            <a class="nav-link"
                                                href="{{ route('user.event.upcoming', ['id' => $user->id]) }}"><i
                                                    class="bi bi-calendar-range me-2" aria-hidden="true"></i>Event</a>
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
                                                                src="{{ $user->image->url ?? asset('assets/img/no-photo.jpg') }}"
                                                                alt="...">
                                                            <a class="btn-photo" type="button" data-bs-toggle="modal"
                                                                data-bs-target="#modalUpload"><i class="bi bi-camera-fill"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <form
                                                        action="{{ route('user.update', ['user' => $user->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="InputName" class="form-label">Name</label>
                                                            <div class="input-group">
                                                                <span
                                                                    class="input-group-text bg-transparent text-secondary"><i
                                                                        class="bi bi-person"></i></span>
                                                                <input type="text" class="form-control border-start-0"
                                                                    id="name" name="name" value="{{ $user->name }}" placeholder="Full Name">
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
                                                                    id="InputEmail" name="email" value="{{ $user->email }}" placeholder="Email">
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
                                                                    id="InputPhone" name="phone" value="{{ $user->phone }}" placeholder="Phone Number">
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
                                            <form class="row g-3 p-3"
                                                action="{{ route('user.change.password', ['id' => $user->id]) }}"
                                                method="POST">
                                                @csrf
                                                <div class="col-md-4">
                                                    <label for="InputPhone" class="form-label">Current Password</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-transparent text-secondary"><i
                                                                class="bi bi-key"></i></span>
                                                        <input type="password" class="form-control border-start-0"
                                                            id="current_password" name="current_password"
                                                            placeholder="Current Password">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="InputPassword3" class="form-label">New Password</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-transparent text-secondary"><i
                                                                class="bi bi-key"></i></span>
                                                        <input type="password" class="form-control border-start-0"
                                                            id="password" name="password" placeholder="New Password">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="InputPassword3" class="form-label">Confirm
                                                        Password</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-transparent text-secondary"><i
                                                                class="bi bi-key"></i></span>
                                                        <input type="password" class="form-control border-start-0"
                                                            id="password_confirmation" name="password_confirmation"
                                                            placeholder="Confirm Password">
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
