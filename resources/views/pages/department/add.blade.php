<div class="modal fade" id="modal-container-add-department" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('departments.add') }}" method="post" role="form" class="form">
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Добавление отдела
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">
                            название*
                        </label>
                        <input type="text" class="form-control" id="name" name="name"/>
                    </div>

                    <div class="form-group">
                        <div class="error-list">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Сохранить
                    </button>
                    <button type="button" class="btn btn-default btn-close" data-dismiss="modal">
                        Отмена
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>