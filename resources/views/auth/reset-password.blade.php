<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signteraktif</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap icon CSS -->
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- Main css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    @include('components.toast')
    <main>
        <section>
            <div class="container-fluid vh-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-6">
                        <div class="col-md-6 mx-auto">
                            <div class="my-4">
                                <a href="index.html">
                                    <img src="{{ asset('assets/img/logo.svg') }}" class="mb-3" height="40"
                                        alt="">
                                </a>
                                <h2 class=""> Reset Password </h2>
                            </div>
                            <form class="mb-4" method="POST" action="{{ route('reset-password.update') }}">
                                @csrf
                                <div class="input-group mb-3" style="display: none">
                                    <span class="input-group-text bg-transparent"><i class="bi bi-lock"></i></span>
                                    <input type="text" class="form-control border-start-0" name="security_code" id="security_code"
                                        value="{{ $user->security_code }}">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-transparent"><i class="bi bi-lock"></i></span>
                                    <input type="password" class="form-control border-start-0" name="password"
                                        id="password" placeholder="New Password">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-transparent"><i class="bi bi-lock"></i></span>
                                    <input type="password" class="form-control border-start-0"
                                        name="password_confirmation" id="password_confirmation"
                                        placeholder="Confirm New Password">
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 bg-gradient-secondary h-100">
                        <div class="d-md-flex align-items-center h-100 p-4">
                            <figure class="text-center">
                                <blockquote class="blockquote text-white">
                                    <p class="small">“ Human eyes are the sign language of the brain.
                                        If you watch them carefully, you can see
                                        the truth played out, raw and unguarded. “</p>
                                </blockquote>
                                <figcaption class="blockquote-footer text-white">
                                    Tarryn Fisher
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Main -->
    <script type="text/javascript" src="assets/js/main.js"></script>
    <!-- Init -->
    <script type="text/javascript">
    </script>
</body>

</html>
