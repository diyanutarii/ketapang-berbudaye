<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('commons.modal-title.detail-data')</h5>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row">
                <div class="col-3">
                    <div class="form-group">
                        <span class="font-weight-bold mb-2">
                            @lang('forms.image.label')
                        </span>
                        <img id="image-detail" class="img-fluid">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <span class="font-weight-bold">
                            @lang('forms.title.label')
                        </span>
                        <p id="title-detail"></p>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <span class="font-weight-bold">
                            @lang('forms.created-at.label')
                        </span>
                        <p id="created-at-detail"></p>
                    </div>

                    <div class="form-group">
                        <span class="font-weight-bold">
                            @lang('forms.updated-at.label')
                        </span>
                        <p id="updated-at-detail"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-dark waves-effect waves-light" data-dismiss="modal">
                    @lang('forms.button.close')
                </button>
            </div>
        </div>
    </div>
</div>
