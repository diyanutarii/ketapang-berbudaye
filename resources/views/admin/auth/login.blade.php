@extends('admin.auth.base')

@section('content')
    <div class="mx-auto w-100 d-block bg-white shadow-lg rounded my-5">
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-login rounded-left"></div>
            <div class="col-lg-7">
                <div class="py-3 px-5">
                    <div class="dropdown d-inline-block float-right">
                        <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            @if (app()->getLocale() == 'en')
                                <img src="{{ asset('assets/images/flags/us.jpg') }}" alt="Header Language" height="16">
                                <span class="d-none d-sm-inline-block ml-1">English</span>
                            @else
                                <img src="{{ asset('assets/images/flags/indo.jpg') }}" alt="Header Language" height="16">
                                <span class="d-none d-sm-inline-block ml-1">Indonesian</span>
                            @endif
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            @if (app()->getLocale() == 'id')
                                <a href="{{ url('locale/en') }}" class="dropdown-item notify-item">
                                    <img src="{{ asset('assets/images/flags/us.jpg') }}" class="mr-1" height="12">
                                    <span class="align-middle">English</span>
                                </a>
                            @else
                                <a href="{{ url('locale/id') }}" class="dropdown-item notify-item">
                                    <img src="{{ asset('assets/images/flags/indo.jpg') }}" class="mr-1" height="12">
                                    <span class="align-middle">Indonesian</span>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="text-center mb-1">
                        <x-logo></x-logo>
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                            <span class="text-capitalize">
                                {{ Session::get('message') }}
                            </span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                            @foreach ($errors->all() as $error)
                                @if (count($errors->all()) > 1)
                                    - <span class="text-capitalize">{{ $error }}</span><br>
                                @else
                                    <span class="text-capitalize">
                                        {{ $error }}
                                    </span>
                                @endif
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h1 class="h5 mt-2 mb-1">{{ __('contents.login.title') }}</h1>
                    <p class="text-muted mb-4">{{ __('contents.login.subtitle') }}</p>
                    <form id="form" action="{{ url('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input id="email" type="text" name="email" class="form-control form-control-user"
                                placeholder="{{ __('forms.email.placeholder') }}" value="{{ old('email') }}">
                            <span id="emailError" class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" name="password" class="form-control form-control-user"
                                placeholder="{{ __('forms.password.placeholder') }}" value="{{ old('password') }}">
                            <span id="passwordError" class="invalid-feedback"></span>
                        </div>
                        <button id="submit" type="submit" class="btn btn-warning btn-block waves-effect waves-light">
                            {{ __('contents.login.button') }}
                        </button>
                    </form>

                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <p class="text-muted mb-2">
                                <a href="{{ url('forgot-password') }}" class="text-muted font-weight-medium ml-1">
                                    {{ __('contents.login.forgot-password') }}
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
                            `<div class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></div> {{ __('contents.login.button-process') }}`
                        );
                    },
                    success: function(response) {
                        if (response.code == 200) {
                            Swal.fire({
                                type: "success",
                                title: `{{ __('responses.login.success.message') }}`,
                                text: response.message,
                                confirmButtonText: `{{ __('responses.login.success.button') }}`,
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
                                title: `{{ __('responses.login.error.message') }}`,
                                text: response.message,
                                confirmButtonText: `{{ __('responses.login.error.button') }}`,
                                confirmButtonColor: "#6C757D",
                            });
                        }

                        $("#submit").html(`{{ __('contents.login.button') }}`);
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

                        $("#submit").html(`{{ __('contents.login.button') }}`);
                    },
                });
            });
        });
    </script>
@endpush
