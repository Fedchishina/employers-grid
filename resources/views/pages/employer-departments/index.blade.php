@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"> @lang('variables.menu.grid') </div>
                    <div class="panel-body">
                        @include('pages.employer-departments.table')
                        {{ $employers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection