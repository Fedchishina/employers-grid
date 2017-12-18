@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавление сотрудника</div>

                    <div class="panel-body">
                        @if (session('success-message'))
                            <div class="alert alert-danger">
                                {{ session('success-message') }}
                            </div>
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route('employers.add') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-4 control-label">Фамилия*</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="col-md-4 control-label">Имя*</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('middle_name') ? ' has-error' : '' }}">
                                <label for="middle_name" class="col-md-4 control-label">Отчество</label>

                                <div class="col-md-6">
                                    <input id="middle_name" type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}">

                                    @if ($errors->has('middle_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('middle_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Пол*</label>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" value="m" {{ ( old('gender') == 'm') ? 'checked' : '' }}> мужчина
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" value="w" {{ ( old('gender') == 'w') ? 'checked' : '' }}> женщина
                                            @if ($errors->has('gender'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('gender') }}</strong>
                                                </span>
                                            @endif
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                                <label for="salary" class="col-md-4 control-label">Зарплата</label>

                                <div class="col-md-6">
                                    <input id="salary" type="number" class="form-control" name="salary" min="1" value="{{ old('salary') }}">

                                    @if ($errors->has('salary'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('salary') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('departments') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Отделы*</label>
                                <div class="col-md-6">
                                @foreach ($departments as $department)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="departments[]" value="{{$department->id}}" @if(in_array($department->id, (array) old('departments'))) checked @endif>
                                            {{$department->name}}
                                        </label>
                                    </div>
                                @endforeach
                                    @if ($errors->has('departments'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('departments') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Добавить сотрудника
                                    </button>

                                    <a class="btn btn-link" href="/">
                                        Отмена
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
