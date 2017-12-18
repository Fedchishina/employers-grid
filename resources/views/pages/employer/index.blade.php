@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Сотрудники</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <a class="btn btn-primary btn-large" href="{{route('employers.add-form')}}" data-toggle="modal">
                                <span><i class="fa fa-plus"></i> добавить сотрудника</span>
                            </a>
                        </div>
                        <div class="table-content">
                            @include('pages.employer.table')
                        </div>
                        @include(('modal.delete'))
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection