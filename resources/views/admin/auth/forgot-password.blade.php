@extends('admin.auth.base')

@section('content')
    <div class="mx-auto w-auto d-block bg-white shadow-lg rounded my-5">
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
            <h1 class="h5 mt-2 mb-1">{{ __('contents.forgot-password.title') }}</h1>
            <p class="text-muted mb-4">{{ __('contents.forgot-password.subtitle') }}</p>
            <form id="form" action="{{ url('forgot-password') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input id="email" type="text" name="email" class="form-control"
                        placeholder="{{ __('forms.email.placeholder') }}" value="{{ old('email') }}">
                    <span id="emailError" class="invalid-feedback"></span>
                </div>
                <button id="submit" type="submit" class="btn btn-warning btn-block waves-effect waves-light">
                    {{ __('contents.forgot-password.button') }}
                </button>
            </form>

            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p class="text-muted mb-2">{{ __('contents.forgot-password.already-have-account') }}
                        <a href="{{ url('login') }}" class="text-muted font-weight-medium ml-1">
                            <b>{{ __('contents.forgot-password.sign-in') }}</b>
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
                            `<div class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></div> {{ __('contents.forgot-password.button-process') }}`
                        );
                    },
                    success: function(response) {
                        if (response.code == 200) {
                            Swal.fire({
                                type: "success",
                                title: `{{ __('responses.forgot-password.success.message') }}`,
                                text: response.message,
                                confirmButtonText: `{{ __('responses.forgot-password.success.button') }}`,
                                confirmButtonColor: "#F7981C",
                            });
                        } else {
                            Swal.fire({
                                type: "error",
                                title: `{{ __('responses.forgot-password.error.message') }}`,
                                text: response.message,
                                confirmButtonText: `{{ __('responses.forgot-password.error.button') }}`,
                                confirmButtonColor: "#6C757D",
                            });
                        }

                        $("#submit").html(`{{ __('contents.forgot-password.button') }}`);
                    },
                    error: function(error) {
                        if (error.status == 422) {
                            var responseError = error["responseJSON"]["errors"];
                            $("#emailError").html(responseError["email"]);

                            if (responseError["email"]) {
                                $("#email").focus();
                                $("#email").addClass("is-invalid");
                            }
                        }

                        console.error(error);

                        $("#submit").html(`{{ __('contents.forgot-password.button') }}`);
                    },
                });
            });
        });
    </script>
@endpush
