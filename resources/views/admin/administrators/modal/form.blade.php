<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="hidden" name="id"
                        value="{{ empty($administrator->id) ? null : $administrator->id }}">
                    <div class="col-12 col-lg-5">
                        <div class="form-group mt-2">
                            <label for="photo">
                                @lang('forms.photo.label')
                            </label>
                            <input type="hidden" name="hidden_photo"
                                value="{{ empty($administrator->photo) ? null : $administrator->photo }}">
                            <input type="file" name="photo" class="dropify"
                                data-default-file="{{ empty($administrator->photo) ? null : asset($administrator->photo) }}"
                                accept=".jpg, .png" />
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="form-group mt-2">
                            <label for="name">
                                @lang('forms.name.label')<span class="text-danger" title="@lang('commons.required')">*</span>
                            </label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="@lang('forms.name.placeholder')"
                                @if (old('name')) value="{{ old('name') }}"
                                    @else
                                        value="{{ empty($administrator->name) ? null : $administrator->name }}" @endif>
                            <span id="nameError" class="invalid-feedback"></span>
                        </div>

                        <div class="form-group">
                            <label for="email">
                                @lang('forms.email.label')
                                <span class="text-danger" title="@lang('commons.required')">*</span>
                            </label>
                            <input type="text" id="email" name="email" class="form-control"
                                placeholder="@lang('forms.email.placeholder')"
                                @if (old('email')) value="{{ old('email') }}"
                                    @else
                                        value="{{ empty($administrator->email) ? null : $administrator->email }}" @endif>
                            <span id="emailError" class="invalid-feedback"></span>
                        </div>

                        <div class="form-group">
                            <label for="level">
                                @lang('forms.level.label')
                                <span class="text-danger" title="@lang('commons.required')">*</span>
                            </label>
                            <select class="form-control" name="level" id="level">
                                <option value="" selected hidden disabled>@lang('forms.level.placeholder')</option>
                                <option value="Admin"
                                    @if (old('level')) {{ old('level') == 'Admin' ? 'selected' : null }}
                                        @elseif (!empty($administrator->id))
                                        {{ $administrator->level == 'Admin' ? 'selected' : null }} @endif>
                                    Admin</option>
                                <option value="Super Admin"
                                    @if (old('level')) {{ old('level') == 'Super Admin' ? 'selected' : null }}
                                        @elseif (!empty($administrator->id))
                                        {{ $administrator->level == 'Super Admin' ? 'selected' : null }} @endif>
                                    Super Admin</option>
                            </select>
                            <span id="levelError" class="invalid-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-dark waves-effect waves-light" data-bs-dismiss="modal">
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
