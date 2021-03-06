<div class="modal fade" id="modal-container-delete" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post" role="form" class="form">
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        @lang('variables.delete_form.title')
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label >
                            @lang('variables.delete_form.message')
                        </label>
                    </div>

                    <div class="form-group">
                        <div class="error-list">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        @lang('variables.buttons.del')
                    </button>
                    <button type="button" class="btn btn-default btn-close" data-dismiss="modal">
                        @lang('variables.buttons.close')
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>