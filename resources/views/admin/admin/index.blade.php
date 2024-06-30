@extends('admin.template.base')

@section('content')
    @include('admin.admin.modal.form')
    @include('admin.admin.modal.detail')

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">@lang('admin/administrator.page-title')</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Master Data</li>
                                <li class="breadcrumb-item active">@lang('admin/administrator.page-title')</li>
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
                                <span>@lang('admin/administrator.table-title')</span>

                                <a id="createButton" href="{{ url('administrators/create') }}"
                                    class="btn btn-dark waves-effect waves-light">
                                    <i class="mdi mdi-plus"></i>
                                    <span>@lang('forms.button.create')</span>
                                </a>
                            </h4>

                            <table id="datatable" class="table datatable dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="10">No</th>
                                        <th width="30"></th>
                                        <th>@lang('admin/administrator.table.name')</th>
                                        <th>@lang('admin/administrator.table.email')</th>
                                        <th class="text-center">@lang('admin/administrator.table.email-verification')</th>
                                        <th>@lang('admin/administrator.table.level')</th>
                                    </tr>
                                </thead>
                                @if (env('AJAX') == false)
                                    <tbody>
                                        @foreach ($administrators as $administrator)
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
                                                            <a href="{{ url('administrators/detail', Crypt::encrypt($administrator->id)) }}"
                                                                class="dropdown-item">
                                                                <i class="mdi mdi-information"></i> @lang('forms.button.details')
                                                            </a>
                                                            <a href="{{ url('administrators/edit', Crypt::encrypt($administrator->id)) }}"
                                                                class="dropdown-item text-warning">
                                                                <i class="mdi mdi-pencil"></i> @lang('forms.button.edit')
                                                            </a>
                                                            <form action="{{ url('administrators/destroy') }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <input type="hidden" name="id"
                                                                    value="{{ $administrator->id }}">
                                                                <button type="submit"
                                                                    class="dropdown-item text-danger destroy"
                                                                    data-id="{{ $administrator->id }}"
                                                                    onclick="return confirm('@lang('commons.confirmation.delete')')">
                                                                    <i class="mdi mdi-trash-can"></i> @lang('forms.button.delete')
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $administrator->name }}</td>
                                                <td>{{ $administrator->email }}</td>
                                                <td class="text-center">
                                                    @if (empty($administrator->email_verified_at))
                                                        <i class="mdi mdi-close-circle text-danger"></i>
                                                    @else
                                                        <i class="mdi mdi-check-circle text-success"
                                                            title="{{ Carbon\Carbon::parse($administrator->email_verified_at)->isoFormat('dddd, D MMMM Y | HH:mm') }}"></i>
                                                    @endif
                                                </td>
                                                <td>{{ $administrator->level }}</td>
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
                var dropify = $("#photo").dropify({
                    messages: {
                        default: "Klik atau seret foto ke sini",
                        replace: "Klik atau seret untuk mengubah foto",
                        remove: "Hapus",
                        error: "Oops, Terjadi Kesalahan",
                    },
                });
            @else
                var dropify = $('.dropify').dropify({
                    messages: {
                        'default': 'Click or drag and drop a photo',
                        'replace': 'Click or drag and drop to replace',
                        'remove': 'Remove',
                        'error': 'Error. The file is either not square, larger than 2 MB or not an acceptable file type'
                    }
                });
            @endif
            // Menghapus nilai foto pada Dropify
            dropify.on("dropify.afterClear", function() {
                $("#hiddenPhoto").val("");
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
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'email_verified_at',
                        name: 'email_verified_at',
                        class: 'text-center',
                    },
                    {
                        data: 'level',
                        name: 'level',
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
                $("#name").val("").removeClass("is-invalid");
                $("#email").val("").removeClass("is-invalid");
                $("#level").val("").removeClass("is-invalid");

                var dropify = $("#photo").dropify({
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
                        $("#name").removeClass("is-invalid");
                        $("#email").removeClass("is-invalid");
                        $("#level").removeClass("is-invalid");

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
                            $("#nameError").html(responseError["name"]);
                            $("#emailError").html(responseError["email"]);
                            $("#levelError").html(responseError["level"]);

                            if (responseError["level"]) {
                                $("#level").addClass("is-invalid").focus();
                            }

                            if (responseError["email"]) {
                                $("#email").addClass("is-invalid").focus();
                            }

                            if (responseError["name"]) {
                                $("#name").addClass("is-invalid").focus();
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

                        if (response.data.photo) {
                            $("#photo-detail").prop("src", response.data.photo);
                        } else {
                            $("#photo-detail").prop("src", "image-error.png");
                        }

                        $("#name-detail").html(response.data.name);
                        $("#email-detail").html(response.data.email);
                        $("#level-detail").html(response.data.level);
                        $("#email-verified-at-detail").html(response.email_verified_at);
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
                        $("#name").val("").removeClass("is-invalid");
                        $("#email").val("").removeClass("is-invalid");
                        $("#level").val("").removeClass("is-invalid");

                        $("#id").val(response.data.id);
                        $("#name").val(response.data.name);
                        $("#email").val(response.data.email);
                        $("#level").val(response.data.level);
                        $("#hiddenPhoto").val(response.data.photo);

                        var dropify = $("#photo").dropify({
                            defaultFile: response.data.photo,
                        });

                        dropify = dropify.data("dropify");
                        dropify.resetPreview();
                        dropify.clearElement();
                        dropify.settings.defaultFile = response.data.photo;
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
