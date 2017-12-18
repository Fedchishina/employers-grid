@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Сотрудники</div>
                    <div class="panel-body">
                        @if (session('success-message'))
                            <div class="alert alert-success">
                                {{ session('success-message') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <a class="btn btn-primary btn-large" href="#" data-toggle="modal">
                                <span><i class="fa fa-plus"></i> добавить сотрудника</span>
                            </a>
                        </div>
                        <div class="table-content">
                            @include('pages.employer.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection