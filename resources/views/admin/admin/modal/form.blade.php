<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" data-backdrop="static"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" action="{{ url('administrators/store') }}" method="POST"
                enctype="multipart/form-data">
                <div class="modal-body row">
                    @csrf
                    <input id="id" type="hidden" name="id">
                    <div class="col-12 col-lg-5">
                        <div class="form-group mt-2">
                            <label for="photo">
                                @lang('forms.photo.label')
                            </label>
                            <input id="hiddenPhoto" type="hidden" name="hidden_photo">
                            <input id="photo" type="file" name="photo" class="dropify" accept=".jpg, .png" />
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

                        <div class="form-group">
                            <label for="email">
                                @lang('forms.email.label')
                                <span class="text-danger" title="@lang('commons.required')">*</span>
                            </label>
                            <input id="email" type="text" name="email" class="form-control"
                                placeholder="@lang('forms.email.placeholder')">
                            <span id="emailError" class="invalid-feedback"></span>
                        </div>

                        <div class="form-group">
                            <label for="level">
                                @lang('forms.level.label')
                                <span class="text-danger" title="@lang('commons.required')">*</span>
                            </label>
                            <select id="level" class="form-control" name="level">
                                <option value="" selected hidden disabled>@lang('forms.level.placeholder')</option>
                                <option value="Admin"> Admin</option>
                                <option value="Super Admin"> Super Admin</option>
                            </select>
                            <span id="levelError" class="invalid-feedback"></span>
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
