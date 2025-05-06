<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Franchise CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Franchise Admin System" name="description" />
    <meta content="YourCompany" name="author" />
    <link rel="shortcut icon" href="{{ url('assets/images/bizvender-logo-sm.png') }}">

    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary-subtle">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome!</h5>
                                        <p>Login to your admin panel.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ url('assets/images/profile-img.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <!-- <div class="auth-logo text-center mt-4">
                                <a href="/" class="auth-logo-dark">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="{{ url('assets/images/logo.svg') }}" alt="" class="rounded-circle" height="34">
                                    </span>
                                </a>
                            </div> -->

                            <div class="p-3 mt-3">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autofocus>

                                        @error('email')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required>
                                            <button class="btn btn-light" type="button" id="password-addon">
                                                <i class="mdi mdi-eye-outline"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            Remember me
                                        </label>
                                    </div>

                                    <div class="d-grid mt-4">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                                            Log In
                                        </button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        @if (Route::has('password.request'))
                                            <a class="text-muted" href="{{ route('password.request') }}">
                                                <i class="mdi mdi-lock me-1"></i> Forgot your password?
                                            </a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <p>© <script>document.write(new Date().getFullYear())</script> Franchise CMS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ url('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ url('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ url('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ url('assets/js/app.js') }}"></script>
</body>

</html>
