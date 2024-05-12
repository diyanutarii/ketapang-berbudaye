@extends('admin.template.base')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <x-alert></x-alert>
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">@lang('admin/dashboard.page-title')</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">{{ env('APP_NAME') }}</li>
                                <li class="breadcrumb-item active">@lang('admin/dashboard.page-title')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <h5 class="card-title mb-0">
                                    @lang('admin/template.sidebar.tangible-cultural-heritage')
                                </h5>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{ $tangible_cultural_heritages_count }}
                                </h2>
                            </div>
                        </div>
                        <!--end card body-->
                    </div><!-- end card-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <h5 class="card-title mb-0">
                                    @lang('admin/template.sidebar.intangible-cultural-heritage')
                                </h5>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{ $intangible_cultural_heritages_count }}
                                </h2>
                            </div>
                        </div>
                        <!--end card body-->
                    </div><!-- end card-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <h5 class="card-title mb-0">
                                    @lang('admin/template.sidebar.event')
                                </h5>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{ $events_count }}
                                </h2>
                            </div>
                        </div>
                        <!--end card body-->
                    </div>
                    <!--end card-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <h5 class="card-title mb-0">
                                    @lang('admin/template.sidebar.reference')
                                </h5>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{ $libraries_count }}
                                </h2>
                            </div>
                        </div>
                        <!--end card body-->
                    </div><!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- container-fluid -->
    </div>
@endsection
