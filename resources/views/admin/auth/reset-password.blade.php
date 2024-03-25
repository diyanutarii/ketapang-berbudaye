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
            <h1 class="h5 mt-2 mb-1">{{ __('contents.reset-password.title') }}</h1>
            <p class="text-muted mb-4">{{ __('contents.reset-password.subtitle') }}</p>
            <div class="text-center">
                <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="Generic placeholder image"
                    class="avatar-md rounded-circle img-thumbnail">
                <h1 class="h5 mb-4 mt-2">{{ $user->name }}</h1>
            </div>
            <form id="form" action="{{ url('reset-password') }}" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ $user->email }}">
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <input id="password" type="password" name="password" class="form-control"
                        placeholder="{{ __('forms.password.new.placeholder') }}" value="{{ old('password') }}">
                    <span id="passwordError" class="invalid-feedback"></span>
                </div>
                <div class="form-group">
                    <input id="passwordConfirmation" type="password" name="password_confirmation" class="form-control"
                        placeholder="{{ __('forms.password.confirmation.placeholder') }}"
                        value="{{ old('password_confirmation') }}">
                    <span id="passwordConfirmationError" class="invalid-feedback"></span>
                </div>
                <button id="submit" type="submit" class="btn btn-warning btn-block waves-effect waves-light mb-2">
                    {{ __('contents.reset-password.button') }}
                </button>
            </form>
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
                        $("#password").removeClass("is-invalid");
                        $("#passwordConfirmation").removeClass("is-invalid");
                        $("#submit").html(
                            `<div class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></div> {{ __('contents.reset-password.button-process') }}`
                        );
                    },
                    success: function(response) {
                        if (response.code == 200) {
                            Swal.fire({
                                type: "success",
                                title: `{{ __('responses.reset-password.success.message') }}`,
                                text: response.message,
                                confirmButtonText: `{{ __('responses.reset-password.success.button') }}`,
                                confirmButtonColor: "#F7981C",
                                backdrop: true,
                            }).then((result) => {
                                if (result.value == true) {
                                    window.location.href = '/login';
                                }
                            });
                        } else {
                            Swal.fire({
                                type: "error",
                                title: `{{ __('responses.reset-password.error.message') }}`,
                                text: response.message,
                                confirmButtonText: `{{ __('responses.reset-password.error.button') }}`,
                                confirmButtonColor: "#6C757D",
                            });
                        }

                        $("#submit").html(`{{ __('contents.reset-password.button') }}`);
                    },
                    error: function(error) {
                        if (error.status == 422) {
                            var responseError = error["responseJSON"]["errors"];
                            $("#passwordError").html(responseError["password"]);
                            $("#passwordConfirmationError").html(responseError[
                                "password_confirmation"]);

                            if (responseError["password_confirmation"]) {
                                $("#passwordConfirmation").focus();
                                $("#passwordConfirmation").addClass("is-invalid");
                            }

                            if (responseError["password"]) {
                                $("#password").focus();
                                $("#password").addClass("is-invalid");
                            }
                        }

                        console.error(error);

                        $("#submit").html(`{{ __('contents.reset-password.button') }}`);
                    },
                });
            });
        });
    </script>
@endpush
