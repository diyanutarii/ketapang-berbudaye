@extends('admin.template.base')

@section('content')
    @include('admin.pustaka.modal.form')
    @include('admin.pustaka.modal.detail')

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">@lang('admin/library.page-title')</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Master Data</li>
                                <li class="breadcrumb-item active">@lang('admin/library.page-title')</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <x-admin-alert></x-admin-alert>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title d-flex justify-content-between">
                                <span>@lang('admin/library.table-title')</span>

                                <a id="createButton" href="{{ url('libraries/create') }}"
                                    class="btn btn-dark waves-effect waves-light">
                                    <i class="mdi mdi-plus"></i>
                                    <span>@lang('forms.button.create')</span>
                                </a>
                            </h4>

                            <table id="datatable" class="table datatable nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="10">No</th>
                                        <th width="30"></th>
                                        <th>@lang('admin/library.table.title')</th>
                                    </tr>
                                </thead>
                                @if (env('AJAX') == false)
                                    <tbody>
                                        @foreach ($libraries as $library)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-light dropdown-toggle waves-effect waves-light"
                                                            type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            @lang('forms.button.action') <i class="mdi mdi-chevron-down"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a href="{{ url('libraries/detail', Crypt::encrypt($library->id)) }}"
                                                                class="dropdown-item">
                                                                <i class="mdi mdi-information"></i> @lang('forms.button.details')
                                                            </a>
                                                            <a href="{{ url('libraries/edit', Crypt::encrypt($library->id)) }}"
                                                                class="dropdown-item text-warning">
                                                                <i class="mdi mdi-pencil"></i> @lang('forms.button.edit')
                                                            </a>
                                                            <form action="{{ url('libraries/destroy') }}" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <input type="hidden" name="id"
                                                                    value="{{ $library->id }}">
                                                                <button type="submit"
                                                                    class="dropdown-item text-danger destroy"
                                                                    data-id="{{ $library->id }}"
                                                                    onclick="return confirm('@lang('commons.confirmation.delete')')">
                                                                    <i class="mdi mdi-trash-can"></i> @lang('forms.button.delete')
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $library->title }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @endif
                            </table>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div> <!-- container-fluid -->
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

            // Inisiasi Dropify
            @if (App::isLocale('id'))
                var dropify = $("#image").dropify({
                    messages: {
                        default: "Klik atau seret file ke sini",
                        replace: "Klik atau seret untuk mengubah file",
                        remove: "Hapus",
                        error: "Oops, Terjadi Kesalahan",
                    },
                });
            @else
                var dropify = $('.dropify').dropify({
                    messages: {
                        'default': 'Click or drag and drop a file',
                        'replace': 'Click or drag and drop to replace',
                        'remove': 'Remove',
                        'error': 'Error. The file is either not square, larger than 2 MB or not an acceptable file type'
                    }
                });
            @endif
            // Menghapus nilai foto pada Dropify
            dropify.on("dropify.afterClear", function() {
                $("#hiddenImage").val("");
            });

            var table = $("#datatable").DataTable({
                stateSave: true,
                responsive: true,
                autoWidth: false,
                ajax: document.URL,
                destroy: true,
                processing: true,
                serverSide: true,
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'title',
                        name: 'title',
                    },
                ],
                @if (App::isLocale('id'))
                    oLanguage: {
                        sSearch: "Pencarian",
                        sInfoEmpty: "Data Belum Tersedia",
                        sInfo: "Menampilkan _PAGE_ dari _PAGES_ halaman",
                        sEmptyTable: "Data Belum Tersedia",
                        sLengthMenu: "Tampilkan _MENU_ Baris",
                        sZeroRecords: "Data Tidak Ditemukan",
                        sProcessing: "Sedang Memproses...",
                        oPaginate: {
                            sFirst: "Pertama",
                            sPrevious: "<i class='mdi mdi-chevron-left'>",
                            sNext: "<i class='mdi mdi-chevron-right'>",
                            sLast: "Terakhir",
                        },
                    },
                @else
                    oLanguage: {
                        oPaginate: {
                            sPrevious: "<i class='mdi mdi-chevron-left'>",
                            sNext: "<i class='mdi mdi-chevron-right'>",
                        },
                    },
                @endif
            });

            $("#createButton").on("click", function(e) {
                e.stopImmediatePropagation();
                e.preventDefault();
                e.stopPropagation();

                $("#formModal").modal("show");
                $("#modalTitle").html("@lang('commons.modal-title.create-data')");
                $("#button").html("@lang('forms.button.save')").removeClass("btn-warning");

                $("#id").val("");
                $("#title").val("").removeClass("is-invalid");

                var dropify = $("#image").dropify({
                    defaultFile: null,
                });

                dropify = dropify.data("dropify");
                dropify.resetPreview();
                dropify.clearElement();
                dropify.settings.defaultFile = null;
                dropify.destroy();
                dropify.init();
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
                        $("#title").removeClass("is-invalid");

                        $("#button").html(
                            `<div class="text-center"><div class="spinner-border spinner-border-sm text-white"></div> @lang('forms.button.save-loading')</div>`
                        );
                    },
                    success: function(response) {
                        // Merefresh tabel tanpa merubah posisi state dan pagination
                        table.ajax.reload(null, false);
                        $("#formModal").modal("hide");

                        if (response.code == 200) {
                            Toast.fire({
                                type: "success",
                                text: response.message + "\n" + response.caption,
                            });
                        }
                    },
                    error: function(error) {
                        // Mengendalikan validasi ketika menyimpan data
                        if (error.status == 422) {
                            var responseError = error["responseJSON"]["errors"];
                            $("#titleError").html(responseError["title"]);

                            if (responseError["title"]) {
                                $("#title").addClass("is-invalid").focus();
                            }
                        } else {
                            console.error(error);
                            errorHandling(error.status);
                        }

                        $("#button").html("@lang('forms.button.save')");
                    },
                });
            });

            $("body").on("click", ".detail", function() {
                $.ajax({
                    type: "POST",
                    url: document.URL + "/check",
                    data: {
                        id: $(this).data("id"),
                    },
                    success: function(response) {
                        $("#detailModal").modal("show");

                        if (response.data.image) {
                            $("#image-detail").prop("src", response.data.image);
                        } else {
                            $("#image-detail").prop("src", "image-error.png");
                        }

                        $("#title-detail").html(response.data.title);
                        $("#created-at-detail").html(response.created_at);
                        $("#updated-at-detail").html(response.updated_at);
                    },
                    error: function(error) {
                        console.error(error);
                        errorHandling(error.status);
                    },
                });
            });

            $("body").on("click", ".edit", function() {
                $.ajax({
                    type: "POST",
                    url: document.URL + "/check",
                    data: {
                        id: $(this).data("id"),
                    },
                    success: function(response) {
                        $("#formModal").modal("show");
                        $("#modalTitle").html("@lang('commons.modal-title.update-data')");
                        $("#button").html("@lang('forms.button.save')").addClass("btn-warning");
                        $("#title").val("").removeClass("is-invalid");

                        $("#id").val(response.data.id);
                        $("#title").val(response.data.title);
                        $("#hiddenImage").val(response.data.image);

                        var dropify = $("#image").dropify({
                            defaultFile: response.data.image,
                        });

                        dropify = dropify.data("dropify");
                        dropify.resetPreview();
                        dropify.clearElement();
                        dropify.settings.defaultFile = response.data.image;
                        dropify.destroy();
                        dropify.init();
                    },
                    error: function(error) {
                        console.error(error);
                        errorHandling(error.status);
                    },
                });
            });

            $("body").on('click', '.destroy', function(e) {
                e.stopImmediatePropagation();
                e.preventDefault();
                e.stopPropagation();

                var id = $(this).data("id");

                Swal.fire({
                    type: "error",
                    title: "@lang('commons.confirmation.delete')",
                    showCancelButton: true,
                    confirmButtonText: "@lang('commons.confirmation.yes-button')",
                    cancelButtonText: "@lang('commons.confirmation.no-button')",
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            type: "DELETE",
                            url: document.URL + "/destroy",
                            data: {
                                id: id,
                            },
                            success: function(response) {
                                table.ajax.reload(null, false);

                                Toast.fire({
                                    type: "success",
                                    text: response.message + "\n" + response
                                        .caption,
                                });
                            },
                            error: function(error) {
                                console.error(error);
                                errorHandling(error.status);
                            },
                        });
                    }
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
