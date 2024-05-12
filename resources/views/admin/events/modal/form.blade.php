<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" data-backdrop="static"
    aria-hidden="true">
    <div class="modal-dialog modal-lg   " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" action="{{ url('events/store') }}" method="POST"
                enctype="multipart/form-data">
                <div class="modal-body row">
                    @csrf
                    <input id="id" type="hidden" name="id">
                    <div class="col-12 col-lg-5">
                        <div class="form-group mt-2">
                            <label for="image">
                                @lang('forms.image.label')
                            </label>
                            <input id="hiddenImage" type="hidden" name="hidden_photo">
                            <input id="image" type="file" name="image" class="dropify" accept=".jpg, .png" />
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="form-group mt-2">
                            <label for="name">
                                @lang('forms.name.label')<span class="text-danger" title="@lang('commons.required')">*</span>
                            </label>
                            <input id="name" type="text" name="name" class="form-control"
                                placeholder="@lang('forms.name.placeholder')">
                            <span id="nameError" class="invalid-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-dark waves-effect waves-light" data-dismiss="modal">
                        @lang('forms.button.close')
                    </button>
                    <button id="button" type="submit" class="btn btn-primary waves-effect waves-light">
                        @lang('forms.button.create')
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
