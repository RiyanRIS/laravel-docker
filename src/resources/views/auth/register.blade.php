@extends('layouts.auth')

@section('content')
    <div class="container-lg">
        <div class="row mt-4 justify-content-center mx-0">
            <div class="col-xl-4 col-lg-6">
                <div class="card shadow-none">
                    <div class="card-body p-sm-6">
                        <div class="text-center mb-4">
                            <h4 class="mb-1">Sign Up</h4>
                            <p>Sign up to your account to continue.</p>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="mb-2 fw-500">Nama Lengkap<span class="text-danger ms-1">*</span></label>
                                    <input type="text" name="name" class="form-control ms-0"
                                        placeholder="Masukkan nama lengkap anda">
                                        <div class="invalid-feedback">
                                            Nama Lengkap tidak boleh kosong.
                                        </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="mb-2 fw-500">Username<span class="text-danger ms-1">*</span></label>
                                    <input type="text" name="username" class="form-control ms-0"
                                        placeholder="Buat username unik anda">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="mb-2 fw-500">Create a Password<span
                                            class="text-danger ms-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="password" name="password" class="form-control ms-0 border-end-0"
                                            placeholder="Create a Password" id="signup-password" required>
                                        <button class="btn btn-light" onclick="createpassword('signup-password',this)"
                                            type="button" id="button-addon2"><i
                                                class="ri-eye-off-line align-middle"></i></button>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="mb-2 fw-500">Confirm Password<span
                                            class="text-danger ms-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="password" name="confirmpassword" class="form-control ms-0 border-end-0"
                                            placeholder="Confirm your Password" id="signup-confirmpassword" required>
                                        <button class="btn btn-light"
                                            onclick="createpassword('signup-confirmpassword',this)" type="button"
                                            id="button-addon21"><i class="ri-eye-off-line align-middle"></i></button>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="d-grid mb-3">
                                    <button class="btn btn-register btn-primary"> Create an Account</button>
                                </div>
                                <div class="text-center">
                                    <p class="mb-0 tx-14">Already have an account ?
                                        <a href="{{ route('login') }}"
                                            class="tx-primary ms-1 text-decoration-underline">Login</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 d-none"></div>
        </div>
    </div>
@endsection

@section('script')
    <script src="build/assets/show-password.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {

            $(".btn-register").click(function() {

                var input_name = $("input[name='name']");

                var name = input_name.val();
                var username = $("#input[name='username']").val();
                var password = $("#input[name='password']").val();
                var confirmpassword = $("#input[name='confirmpassword']").val();
                var token = $("meta[name='csrf-token']").attr("content");

                if (name.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Nama Lengkap Wajib Diisi !'
                    });
                    input_name.addClass('is-invalid');

                } else if (username.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Username Wajib Diisi !'
                    });

                } else if (password.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Password Wajib Diisi !'
                    });

                } else if (confirmpassword.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Konfirmasi Password Wajib Diisi !'
                    });

                } else if (password != confirmpassword) {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Password Wajib Diisi !'
                    });

                } else {

                    //ajax
                    $.ajax({

                        url: "{{ route('register.store') }}",
                        type: "POST",
                        cache: false,
                        data: {
                            "name": name,
                            "username": username,
                            "password": password,
                            "_token": token
                        },

                        success: function(response) {

                            if (response.success) {

                                Swal.fire({
                                    type: 'success',
                                    title: 'Register Berhasil!',
                                    text: 'silahkan login!'
                                });

                                $("#name").val('');
                                $("#username").val('');
                                $("#password").val('');
                                $("#confirmpassword").val('');

                            } else {

                                Swal.fire({
                                    type: 'error',
                                    title: 'Register Gagal!',
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
                        }

                    })

                }

            });

        });
    </script>
@endsection
