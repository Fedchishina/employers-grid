@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Сетка</div>
                    <div class="panel-body">
                        @include('pages.employer-departments.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection