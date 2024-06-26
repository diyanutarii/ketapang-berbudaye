@extends('admin.auth.base')

@section('content')
    <div class="mx-auto w-auto d-block bg-white shadow-lg rounded my-5">
        <div class="py-3 px-5">
            <div class="dropdown d-inline-block float-right">
                <x-admin-lang-button></x-admin-lang-button>
            </div>

            <div class="text-center mb-1">
                <x-admin-logo></x-admin-logo>
            </div>

            <x-admin-alert></x-admin-alert>

            <h1 class="h5 mt-2 mb-1">@lang('auth/forgot-password.title')</h1>
            <p class="text-muted mb-4">@lang('auth/forgot-password.subtitle')</p>
            <form id="form" action="{{ url('forgot-password') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input id="email" type="text" name="email" class="form-control" placeholder="@lang('forms.email.placeholder')"
                        value="{{ old('email') }}">
                    <span id="emailError" class="invalid-feedback"></span>
                </div>
                <button id="submit" type="submit" class="btn btn-warning btn-block waves-effect waves-light">
                    @lang('auth/forgot-password.button')
                </button>
            </form>

            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p class="text-muted mb-2">
                        @lang('auth/forgot-password.already-have-account')
                        <a href="{{ url('login') }}" class="text-muted font-weight-medium ml-1">
                            <b>@lang('auth/forgot-password.sign-in')</b>
                        </a>
                    </p>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- end .padding-5 -->
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: "bottom-end",
                showConfirmButton: false,
                timer: 3000,
            });

            $("#form").on("submit", function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    data: new FormData(this),
                    processData: false,
                    dataType: "json",
                    contentType: false,
                    beforeSend: function() {
                        $("#email").removeClass("is-invalid");
                        $("#submit").html(
                            `<div class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></div> @lang('auth/forgot-password.button-process')`
                        );
                    },
                    success: function(response) {
                        if (response.code == 202) {
                            Swal.fire({
                                type: "success",
                                title: response.message,
                                text: response.caption,
                                confirmButtonText: `@lang('responses.forgot-password.success.button')`,
                                confirmButtonColor: "#F7981C",
                            });
                        } else {
                            Swal.fire({
                                type: "error",
                                title: response.message,
                                text: response.caption,
                                confirmButtonText: `@lang('responses.forgot-password.error.button')`,
                                confirmButtonColor: "#6C757D",
                            });
                        }

                        $("#submit").html(`@lang('auth/forgot-password.button')`);
                    },
                    error: function(error) {
                        if (error.status == 422) {
                            var responseError = error["responseJSON"]["errors"];
                            $("#emailError").html(responseError["email"]);

                            if (responseError["email"]) {
                                $("#email").focus();
                                $("#email").addClass("is-invalid");
                            }
                        } else {
                            console.error(error);
                            errorHandling(error.status);
                        }

                        $("#submit").html(`@lang('auth/forgot-password.button')`);
                    },
                });
            });


            function errorHandling(errorCode) {
                if (errorCode == 500) {
                    Toast.fire({
                        type: "error",
                        title: "Gagal! \nTerjadi kesalahan pada sistem.",
                    });
                } else if (errorCode == 404) {
                    Toast.fire({
                        type: "error",
                        title: "Data Tidak Ditemukan! \nData mungkin telah terhapus sebelumnya.",
                    });
                    table.ajax.reload(null, false);
                } else if (errorCode == 419) {
                    Toast.fire({
                        type: "error",
                        title: "Sesi Telah Berakhir! \nMemuat ulang sistem untuk anda.",
                    });

                    setTimeout(() => {
                        window.location.reload();
                    }, 3000);
                } else {
                    Toast.fire({
                        type: "error",
                        title: "Masalah Tidak Dikenali! \nMencoba memuat kembali untuk anda.",
                    });

                    setTimeout(() => {
                        window.location.reload();
                    }, 3000);
                }
            }
        });
    </script>
@endpush
