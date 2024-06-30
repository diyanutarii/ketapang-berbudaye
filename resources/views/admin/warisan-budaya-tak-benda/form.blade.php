@extends('admin.template.base')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <a href="{{ url('intangible-cultural-heritages') }}" class="text-dark">
                            <i class="mdi mdi-arrow-left"></i> @lang('forms.button.back')
                        </a>

                        <div class="page-title-right d-none d-sm-block">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Master Data</li>
                                <li class="breadcrumb-item">@lang('admin/intangible.page-title')</li>

                                @if (Route::current()->uri == 'intangible-cultural-heritages/create')
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
                <form id="form" action="{{ url('intangible-cultural-heritages/store') }}" method="POST"
                    enctype="multipart/form-data">
                    <div class="card-body row">
                        @csrf
                        <div class="card-body row">
                            @csrf
                            <input id="id" type="hidden" name="id"
                                value="{{ empty($intangible_cultural_heritage->id) ? null : $intangible_cultural_heritage->id }}">
                            <div class="col-12 col-lg-6">
                                <div class="form-group mt-2">
                                    <label for="photo">
                                        @lang('forms.photo.label')
                                    </label>
                                    <input id="hiddenPhoto" type="hidden" name="hidden_photo"
                                        value="{{ empty($intangible_cultural_heritage->photo) ? null : $intangible_cultural_heritage->photo }}">
                                    <input id="photo" type="file" name="photo" class="dropify"
                                        data-default-file="{{ empty($intangible_cultural_heritage->photo) ? null : asset($intangible_cultural_heritage->photo) }}"
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
                                            value="{{ empty($intangible_cultural_heritage->name) ? null : $intangible_cultural_heritage->name }}" @endif>
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
                                            value="{{ empty($intangible_cultural_heritage->sk_number) ? null : $intangible_cultural_heritage->sk_number }}" @endif>
                                    <span id="skNumberError" class="invalid-feedback"></span>
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
{{ empty($intangible_cultural_heritage->description) ? null : $intangible_cultural_heritage->description }}
@endif
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7">
                            <div class="form-group mt-2">
                                <label for="name">
                                    @lang('forms.name.label')<span class="text-danger" title="@lang('commons.required')">*</span>
                                </label>
                                <input id="name" type="text" name="name" class="form-control"
                                    placeholder="@lang('forms.name.placeholder')"
                                    @if (old('name')) value="{{ old('name') }}"
                                    @else
                                        value="{{ empty($intangible_cultural_heritage->name) ? null : $intangible_cultural_heritage->name }}" @endif>
                                <span id="nameError" class="invalid-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        @if (Route::current()->uri == 'intangible-cultural-heritages/create')
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

                        @if (Route::current()->uri == 'intangible-cultural-heritages/create')
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
                                        '/intangible-cultural-heritages';
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

                        @if (Route::current()->uri == 'intangible-cultural-heritages/create')
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

                        @if (Route::current()->uri == 'intangible-cultural-heritages/create')
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
