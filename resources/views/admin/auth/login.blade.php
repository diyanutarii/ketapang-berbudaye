@extends('admin.auth.base')

@section('content')
    <div class="mx-auto w-100 d-block bg-white shadow-lg rounded my-5">
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-login rounded-left"></div>
            <div class="col-lg-7">
                <div class="py-3 px-5">
                    <div class="dropdown d-inline-block float-right">
                        <x-lang-button></x-lang-button>
                    </div>

                    <div class="text-center mb-1">
                        <x-logo></x-logo>
                    </div>

                    <x-alert></x-alert>

                    <h1 class="h5 mt-2 mb-1">@lang('auth/login.title')</h1>
                    <p class="text-muted mb-4">@lang('auth/login.subtitle')</p>
                    <form id="form" action="{{ url('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input id="email" type="text" name="email" class="form-control form-control-user"
                                placeholder="@lang('forms.email.placeholder')" value="{{ old('email') }}">
                            <span id="emailError" class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" name="password" class="form-control form-control-user"
                                placeholder="@lang('forms.password.placeholder')" value="{{ old('password') }}">
                            <span id="passwordError" class="invalid-feedback"></span>
                        </div>
                        <button id="submit" type="submit" class="btn btn-warning btn-block waves-effect waves-light">
                            @lang('auth/login.button')
                        </button>
                    </form>

                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <p class="text-muted mb-2">
                                <a href="{{ url('forgot-password') }}" class="text-muted font-weight-medium ml-1">
                                    @lang('auth/login.forgot-password')
                                </a>
                            </p>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div> <!-- end .padding-5 -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
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
                        $("#password").removeClass("is-invalid");
                        $("#submit").html(
                            `<div class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></div> @lang('auth/login.button-process')`
                        );
                    },
                    success: function(response) {
                        if (response.code == 200) {
                            Swal.fire({
                                type: "success",
                                title: response.message,
                                text: response.caption,
                                confirmButtonText: `@lang('responses.login.success.button')`,
                                confirmButtonColor: "#F7981C",
                                backdrop: true,
                            }).then((result) => {
                                if (result.value == true) {
                                    window.location.href = '/dashboard';
                                }
                            });
                        } else {
                            Swal.fire({
                                type: "error",
                                title: response.message,
                                text: response.caption,
                                confirmButtonText: `@lang('responses.login.error.button')`,
                                confirmButtonColor: "#6C757D",
                            });
                        }

                        $("#submit").html(`@lang('auth/login.button')`);
                    },
                    error: function(error) {
                        if (error.status == 422) {
                            var responseError = error["responseJSON"]["errors"];
                            $("#emailError").html(responseError["email"]);
                            $("#passwordError").html(responseError["password"]);

                            if (responseError["password"]) {
                                $("#password").focus();
                                $("#password").addClass("is-invalid");
                            }

                            if (responseError["email"]) {
                                $("#email").focus();
                                $("#email").addClass("is-invalid");
                            }
                        }

                        console.error(error);

                        $("#submit").html(`@lang('auth/login.button')`);
                    },
                });
            });
        });
    </script>
@endpush
