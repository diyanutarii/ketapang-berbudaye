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

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Master Data</li>
                                <li class="breadcrumb-item">@lang('admin/intangible.page-title')</li>
                                <li class="breadcrumb-item active">@lang('commons.details')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">@lang('admin/intangible.detail-title')</h4>

                    <div class="row">
                        @if ($intangible_cultural_heritage->photo)
                            <div class="col-4">
                                <div class="form-group">
                                    <span class="font-weight-bold mb-2">
                                        @lang('forms.photo.label')
                                    </span>
                                    <img src="{{ asset($intangible_cultural_heritage->photo) }}" class="img-fluid">
                                </div>
                            </div>
                        @endif
                        <div class="col">
                            <div class="form-group">
                                <span class="font-weight-bold">
                                    @lang('forms.name.label')
                                </span>
                                <p>{{ $intangible_cultural_heritage->name }}</p>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <span class="font-weight-bold">
                                    @lang('forms.created-at.label')
                                </span>
                                <p>{{ Carbon\Carbon::parse($intangible_cultural_heritage->created_at)->isoFormat('dddd, D MMMM Y | HH:mm:ss') }}
                                </p>
                            </div>

                            <div class="form-group">
                                <span class="font-weight-bold">
                                    @lang('forms.updated-at.label')
                                </span>
                                <p>{{ Carbon\Carbon::parse($intangible_cultural_heritage->updated_at)->isoFormat('dddd, D MMMM Y | HH:mm:ss') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-body-->
            </div>
            <!-- end card -->
        </div> <!-- container-fluid -->
    </div>
@endsection
