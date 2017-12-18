@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Отделы</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <a class="btn btn-primary btn-large" href="#modal-container-add-department" data-toggle="modal"><span><i class="fa fa-plus"></i> добавить отдел</span></a>
                        </div>
                        <div class="table-content">
                            @include('pages.department.table')
                        </div>
                        @include(('pages.department.add'))
                        @include(('pages.department.edit'))
                        @include(('pages.department.delete'))
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection