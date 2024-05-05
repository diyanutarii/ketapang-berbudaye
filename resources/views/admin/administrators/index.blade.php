@extends('admin.template.base')

@section('content')
    @include('admin.administrators.modal.form')

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

            <x-alert></x-alert>

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
                                        <th class="text-center">No</th>
                                        <th></th>
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
            var dropify = $("#photo").dropify({
                messages: {
                    default: "Klik atau seret foto ke sini",
                    replace: "Klik atau seret untuk mengubah foto",
                    remove: "Hapus",
                    error: "Oops, Terjadi Kesalahan",
                },
            });

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
                $("#modalTitle").html("Tambah Data");
                $("#button").html("Simpan").removeClass("btn-warning");

                $("#id").val("");
                $("#name").val("").removeClass("is-invalid");
                $("#username").val("").removeClass("is-invalid").prop("readonly", false);
                $("#phoneNumber").val("").removeClass("is-invalid");

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
                        $("#username").removeClass("is-invalid");
                        $("#phoneNumber").removeClass("is-invalid");

                        $("#button").html(
                            '<div class="text-center"><div class="spinner-border spinner-border-sm text-white"></div> Memproses...</div>'
                        );
                    },
                    success: function(response) {
                        // Merefresh tabel tanpa merubah posisi state dan pagination
                        table.ajax.reload(null, false);
                        $("#formModal").modal("hide");

                        if (response.code == 200) {
                            Toast.fire({
                                type: "success",
                                title: response.status + "\n" + response.message,
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                        $("#button").html("Simpan");

                        // Mengendalikan validasi ketika menyimpan data
                        if (error.status == 422) {
                            var responseError = error["responseJSON"]["errors"];
                            $("#nameError").html(responseError["name"]);
                            $("#usernameError").html(responseError["username"]);
                            $("#phoneNumberError").html(responseError["phone_number"]);

                            if (responseError["phone_number"]) {
                                $("#phoneNumber").addClass("is-invalid").focus();
                            }

                            if (responseError["username"]) {
                                $("#username").addClass("is-invalid").focus();
                            }

                            if (responseError["name"]) {
                                $("#name").addClass("is-invalid").focus();
                            }
                        } else {
                            errorHandling(error.status);
                        }
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
                        $("#modalTitle").html("Sunting Data");
                        $("#button").html("Simpan").addClass("btn-warning");
                        $("#name").val("").removeClass("is-invalid");
                        $("#username")
                            .val("")
                            .removeClass("is-invalid")
                            .prop("readonly", true);
                        $("#phoneNumber").val("").removeClass("is-invalid");

                        $("#id").val(response.id);
                        $("#name").val(response.name);
                        $("#username").val(response.username);
                        $("#phoneNumber").val(response.phone_number);
                        $("#hiddenPhoto").val(response.photo);

                        var dropify = $("#photo").dropify({
                            defaultFile: response.photo,
                        });

                        dropify = dropify.data("dropify");
                        dropify.resetPreview();
                        dropify.clearElement();
                        dropify.settings.defaultFile = response.photo;
                        dropify.destroy();
                        dropify.init();
                    },
                    error: function(error) {
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
                        console.log("mantap");
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
                        title: "Gagal! \nPeriksa koneksi databasemu.",
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
