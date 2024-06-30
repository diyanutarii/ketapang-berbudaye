@extends('admin.template.base')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <a href="{{ url('tangible-cultural-heritages') }}" class="text-dark">
                            <i class="mdi mdi-arrow-left"></i> @lang('forms.button.back')
                        </a>

                        <div class="page-title-right d-none d-sm-block">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Master Data</li>
                                <li class="breadcrumb-item">@lang('admin/administrator.page-title')</li>

                                @if (Route::current()->uri == 'tangible-cultural-heritages/create')
                                    <li class="breadcrumb-item active">@lang('commons.create')</li>
                                @else
                                    <li class="breadcrumb-item active">@lang('commons.edit')</li>
                                @endif
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <x-admin-alert></x-admin-alert>

            <div class="card">
                <form id="form" action="{{ url('tangible-cultural-heritages/store') }}" method="POST"
                    enctype="multipart/form-data">
                    <div class="card-body row">
                        @csrf
                        <input id="id" type="hidden" name="id"
                            value="{{ empty($tangible_cultural_heritage->id) ? null : $tangible_cultural_heritage->id }}">
                        <div class="col-12 col-lg-6">
                            <div class="form-group mt-2">
                                <label for="photo">
                                    @lang('forms.photo.label')
                                </label>
                                <input id="hiddenPhoto" type="hidden" name="hidden_photo"
                                    value="{{ empty($tangible_cultural_heritage->photo) ? null : $tangible_cultural_heritage->photo }}">
                                <input id="photo" type="file" name="photo" class="dropify"
                                    data-default-file="{{ empty($tangible_cultural_heritage->photo) ? null : asset($tangible_cultural_heritage->photo) }}"
                                    accept=".jpg, .png" />
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group mt-2">
                                <label for="name">
                                    @lang('forms.name.label')<span class="text-danger" title="@lang('commons.required')">*</span>
                                </label>
                                <input id="name" type="text" name="name" class="form-control"
                                    placeholder="@lang('forms.name.placeholder')"
                                    @if (old('name')) value="{{ old('name') }}"
                                    @else
                                        value="{{ empty($tangible_cultural_heritage->name) ? null : $tangible_cultural_heritage->name }}" @endif>
                                <span id="nameError" class="invalid-feedback"></span>
                            </div>
                            <div class="form-group mt-2">
                                <label for="name">
                                    @lang('forms.sk-number.label')<span class="text-danger" title="@lang('commons.required')">*</span>
                                </label>
                                <input id="sk_number" type="text" name="sk_number" class="form-control"
                                    placeholder="@lang('forms.sk-number.placeholder')"
                                    @if (old('sk_number')) value="{{ old('sk_number') }}"
                                    @else
                                        value="{{ empty($tangible_cultural_heritage->sk_number) ? null : $tangible_cultural_heritage->sk_number }}" @endif>
                                <span id="skNumberError" class="invalid-feedback"></span>
                            </div>
                            <div class="form-group mt-2">
                                <label for="address">
                                    @lang('forms.address.label')<span class="text-danger" title="@lang('commons.required')">*</span>
                                </label>
                                <input id="address" type="text" name="address" class="form-control"
                                    placeholder="@lang('forms.address.placeholder')"
                                    @if (old('address')) value="{{ old('address') }}"
                                    @else
                                        value="{{ empty($tangible_cultural_heritage->address) ? null : $tangible_cultural_heritage->address }}" @endif>
                                <span id="addressError" class="invalid-feedback"></span>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mt-2">
                                        <label for="latitude">
                                            @lang('forms.latitude.label')<span class="text-danger" title="@lang('commons.required')">*</span>
                                        </label>
                                        <input id="latitude" type="text" name="latitude" class="form-control"
                                            placeholder="@lang('forms.latitude.placeholder')"
                                            @if (old('latitude')) value="{{ old('latitude') }}"
                                            @else
                                                value="{{ empty($tangible_cultural_heritage->latitude) ? null : $tangible_cultural_heritage->latitude }}" @endif>
                                        <span id="latitudeError" class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group mt-2">
                                        <label for="longitude">
                                            @lang('forms.longitude.label')<span class="text-danger" title="@lang('commons.required')">*</span>
                                        </label>
                                        <input id="longitude" type="text" name="longitude" class="form-control"
                                            placeholder="@lang('forms.longitude.placeholder')"
                                            @if (old('longitude')) value="{{ old('longitude') }}"
                                            @else
                                                value="{{ empty($tangible_cultural_heritage->longitude) ? null : $tangible_cultural_heritage->longitude }}" @endif>
                                        <span id="longitudeError" class="invalid-feedback"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mt-2">
                                <label for="description">
                                    @lang('forms.description.label')<span class="text-danger" title="@lang('commons.required')">*</span>
                                </label>
                                <textarea id="description" name="description" class="tinymce" rows="10">
                                    @if (old('description'))
{{ old('description') }}
@else
{{ empty($tangible_cultural_heritage->description) ? null : $tangible_cultural_heritage->description }}
@endif
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        @if (Route::current()->uri == 'tangible-cultural-heritages/create')
                            <button id="submit" type="submit" class="btn btn-primary">@lang('forms.button.create')</button>
                        @else
                            <button id="submit" type="submit" class="btn btn-warning">@lang('forms.button.save')</button>
                        @endif
                    </div>
                </form>
                <!-- end card-body-->
            </div>
            <!-- end card -->
        </div> <!-- container-fluid -->
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
                        $("#name").removeClass("is-invalid");
                        @if (Route::current()->uri == 'tangible-cultural-heritages/create')
                            $("#submit").html(
                                `<div class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></div> @lang('forms.button.create-loading')`
                            );
                        @else
                            $("#submit").html(
                                `<div class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></div> @lang('forms.button.save-loading')`
                            );
                        @endif
                    },
                    success: function(response) {
                        if (response.code == 200) {
                            Swal.fire({
                                type: "success",
                                title: response.message,
                                text: response.caption,
                                confirmButtonText: `@lang('forms.button.continue')`,
                                confirmButtonColor: "#F7981C",
                                backdrop: true,
                            }).then((result) => {
                                if (result.value == true) {
                                    window.location.href =
                                        '/tangible-cultural-heritages';
                                }
                            });
                        } else {
                            Swal.fire({
                                type: "error",
                                title: response.message,
                                text: response.caption,
                                confirmButtonText: `@lang('forms.button.close')`,
                                confirmButtonColor: "#6C757D",
                            });
                        }

                        @if (Route::current()->uri == 'tangible-cultural-heritages/create')
                            $("#submit").html(`@lang('forms.button.create')`);
                        @else
                            $("#submit").html(`@lang('forms.button.save')`);
                        @endif
                    },
                    error: function(error) {
                        if (error.status == 422) {
                            var responseError = error["responseJSON"]["errors"];
                            $("#nameError").html(responseError["name"]);

                            if (responseError["name"]) {
                                $("#name").addClass("is-invalid").focus();
                            }
                        } else {
                            console.error(error);
                            errorHandling(error.status);
                        }

                        @if (Route::current()->uri == 'tangible-cultural-heritages/create')
                            $("#submit").html(`@lang('forms.button.create')`);
                        @else
                            $("#submit").html(`@lang('forms.button.save')`);
                        @endif
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
