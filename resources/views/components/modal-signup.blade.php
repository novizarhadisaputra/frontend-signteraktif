<div class="modal fade" id="modalSignup" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-4">
                                <div class="my-4">
                                    <h2 class=""> Sign Up to </h2>
                                    <img src="{{ asset('assets/img/logo.svg') }}" class="mb-3" height="40"
                                        alt="">
                                </div>
                                <form action="{{ route('registration') }}" method="POST">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-transparent"><i
                                                class="bi bi-person"></i></span>
                                        <input type="text" class="form-control border-start-0" name="name" id="name"
                                            placeholder="Full Name" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-transparent"><i
                                                class="bi bi-envelope"></i></span>
                                        <input type="email" name="email" class="form-control border-start-0" id="email"
                                            placeholder="Email" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-transparent"><i
                                                class="bi bi-phone"></i></span>
                                        <input type="number" class="form-control border-start-0" name="phone" id="phone"
                                            placeholder="Phone Number">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-transparent"><i
                                                class="bi bi-lock"></i></span>
                                        <input type="password" class="form-control border-start-0" name="password"
                                            id="password" placeholder="Password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                                </form>

                                <div class="text-center my-3"><span>Or Sign Up with</span></div>

                                <button type="submit" class="btn btn-light w-100"><i
                                        class="bi bi-google text-success me-3"></i>Google</button>

                                <div class="text-center my-3"><span>Have an account?</span><a type="button"
                                        data-bs-toggle="modal" data-bs-target="#modalSignin"
                                        class="text-secondary ms-2">Sign In</a></div>
                            </div>
                        </div>
                        <div class="col-md-6 bg-gradient-secondary">
                            <div class="d-flex align-items-center h-100 p-4">
                                <figure class="text-center">
                                    <blockquote class="blockquote text-white">
                                        <p class="small">??? Human eyes are the sign language of the brain.
                                            If you watch them carefully, you can see
                                            the truth played out, raw and unguarded. ???</p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer text-white">
                                        Tarryn Fisher
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
