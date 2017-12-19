@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Сотрудники</div>
                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-{{session('status')}}">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <a class="btn btn-primary btn-large" href="{{route('employers.add-form')}}" data-toggle="modal">
                                <span><i class="fa fa-plus"></i> добавить сотрудника</span>
                            </a>
                        </div>
                        <div class="table-content">
                            @include('pages.employer.table')
                        </div>
                        {{ $employers->links() }}
                        @include(('modal.delete'))
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection