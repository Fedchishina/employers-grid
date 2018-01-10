@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"> @lang('variables.test') </div>
                    <div class="panel-heading"> session {{ \Illuminate\Support\Facades\Session::get('locale') }} </div>
                    <div class="panel-heading"> config {{ \Illuminate\Support\Facades\Config::get('app.locale') }} </div>
                    <div class="panel-body">
                        @include('pages.employer-departments.table')
                        {{ $employers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection