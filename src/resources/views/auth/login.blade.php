@extends('layouts.auth')

@section('content')
    <div class="container-lg">
        <div class="row justify-content-center mt-4 mx-0">
            <div class="col-xl-4 col-lg-6">
                <div class="card shadow-none">
                    <div class="card-body p-sm-6">
                        <div class="text-center mb-4">
                            <h4 class="mb-1">Masuk</h4>
                            <p>Silahkan masuk ke akun anda</p>
                        </div>
                        <div class="row">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2 fw-500">Username<span class="text-danger ms-1">*</span></label>
                                        <input id="username" class="form-control ms-0 @error('username') is-invalid @enderror"
                                            type="username" placeholder="Enter your Username" autofocus="" required="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2 fw-500">Password<span class="text-danger ms-1">*</span></label>
                                        <div>
                                            <input id="password" type="password" class="form-control" id="input-password"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="d-flex mb-3">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label tx-15" for="flexCheckDefault">
                                                Remember me
                                            </label>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <div class="ms-auto">
                                                <a href="{{ route('password.request') }}"
                                                    class="tx-primary ms-1 tx-13">Forgot
                                                    Password?</a>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="d-grid mb-3">
                                        <button class="btn btn-login btn-primary"> Login</button>
                                    </div>
                                    <div class="text-center">
                                        <p class="mb-0 tx-14">Don't have an account yet?
                                            <a href="{{ route('register') }}"
                                                class="tx-primary ms-1 text-decoration-underline">Sign
                                                Up</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {

            $(".btn-login").click(function() {

                var username = $("#username").val();
                var password = $("#password").val();
                var token = $("meta[name='csrf-token']").attr("content");

                if (username.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Username Wajib Diisi!'
                    });

                } else if (password.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Password Wajib Diisi !'
                    });

                } else {

                    $.ajax({

                        url: "{{ route('login.check_login') }}",
                        type: "POST",
                        dataType: "JSON",
                        cache: false,
                        data: {
                            "username": username,
                            "password": password,
                            "_token": token
                        },

                        success: function(response) {

                            if (response.success) {

                                Swal.fire({
                                        type: 'success',
                                        title: 'Login Berhasil!',
                                        text: 'Anda akan di arahkan dalam 3 Detik',
                                        timer: 3000,
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    })
                                    .then(function() {
                                        window.location.href =
                                            "{{ route('dashboard.index') }}";
                                    });

                            } else {

                                console.log(response.success);

                                Swal.fire({
                                    type: 'error',
                                    title: 'Login Gagal!',
                                    text: 'silahkan coba lagi!'
                                });

                            }

                            console.log(response);

                        },

                        error: function(response) {

                            Swal.fire({
                                type: 'error',
                                title: 'Opps!',
                                text: 'server error!'
                            });

                            console.log(response);

                        }

                    });

                }

            });

        });
    </script>
@endsection
