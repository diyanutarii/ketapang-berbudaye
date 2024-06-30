@extends('admin.template.base')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <a href="{{ url('libraries') }}" class="text-dark">
                            <i class="mdi mdi-arrow-left"></i> @lang('forms.button.back')
                        </a>

                        <div class="page-title-right d-none d-sm-block">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Master Data</li>
                                <li class="breadcrumb-item">@lang('admin/library.page-title')</li>

                                @if (Route::current()->uri == 'libraries/create')
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
                <form id="form" action="{{ url('libraries/store') }}" method="POST" enctype="multipart/form-data">
                    <div class="card-body row">
                        @csrf
                        <input id="id" type="hidden" name="id"
                            value="{{ empty($library->id) ? null : $library->id }}">
                        <div class="col-12 col-lg-5">
                            <div class="form-group mt-2">
                                <label for="image">
                                    @lang('forms.image.label')
                                </label>
                                <input id="hiddenImage" type="hidden" name="hidden_image"
                                    value="{{ empty($library->image) ? null : $library->image }}">
                                <input id="image" type="file" name="image" class="dropify"
                                    data-default-file="{{ empty($library->image) ? null : asset($library->image) }}"
                                    accept=".jpg, .png" />
                            </div>
                        </div>
                        <div class="col-12 col-lg-7">
                            <div class="form-group mt-2">
                                <label for="title">
                                    @lang('forms.title.label')<span class="text-danger" title="@lang('commons.required')">*</span>
                                </label>
                                <input id="title" type="text" name="title" class="form-control"
                                    placeholder="@lang('forms.title.placeholder')"
                                    @if (old('title')) value="{{ old('title') }}"
                                    @else
                                        value="{{ empty($library->title) ? null : $library->title }}" @endif>
                                <span id="titleError" class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mt-2">
                                <label for="content">
                                    @lang('forms.content.label')<span class="text-danger" title="@lang('commons.required')">*</span>
                                </label>
                                <textarea id="content" name="content" class="tinymce" rows="10">
                                    @if (old('content'))
{{ old('content') }}
@else
{{ empty($library->content) ? null : $library->content }}
@endif
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        @if (Route::current()->uri == 'libraries/create')
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
                        $("#title").removeClass("is-invalid");

                        @if (Route::current()->uri == 'libraries/create')
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
                                    window.location.href = '/libraries';
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

                        @if (Route::current()->uri == 'libraries/create')
                            $("#submit").html(`@lang('forms.button.create')`);
                        @else
                            $("#submit").html(`@lang('forms.button.save')`);
                        @endif
                    },
                    error: function(error) {
                        if (error.status == 422) {
                            var responseError = error["responseJSON"]["errors"];
                            $("#nameError").html(responseError["title"]);

                            if (responseError["title"]) {
                                $("#title").addClass("is-invalid").focus();
                            }
                        } else {
                            console.error(error);
                            errorHandling(error.status);
                        }

                        @if (Route::current()->uri == 'libraries/create')
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
