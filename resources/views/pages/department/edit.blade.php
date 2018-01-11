<div class="modal fade" id="modal-container-edit-department" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('departments.edit') }}" method="post" role="form" class="form">
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        @lang('variables.department.forms.edit_title')
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">
                            @lang('variables.department.columns.name')*
                        </label>
                        <input type="text" class="form-control" id="name" name="name"/>
                    </div>
                    <input type="hidden" name="id"/>

                    <div class="form-group">
                        <div class="error-list">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        @lang('variables.buttons.save')
                    </button>
                    <button type="button" class="btn btn-default btn-close" data-dismiss="modal">
                        @lang('variables.buttons.close')
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>