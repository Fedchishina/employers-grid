<table class="table">
    <thead>
    <tr>
        <th>@lang('variables.employers.columns.last_name')</th>
        <th>@lang('variables.employers.columns.first_name')</th>
        <th>@lang('variables.employers.columns.middle_name')</th>
        <th>@lang('variables.employers.columns.gender')</th>
        <th>@lang('variables.employers.columns.salary')</th>
        <th>@lang('variables.employers.columns.departments')</th>
        <th>@lang('variables.employers.columns.actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($employers as $employer)
        <tr>
            <td>{{ $employer->last_name }}</td>
            <td>{{ $employer->first_name }}</td>
            <td>{{ $employer->middle_name }}</td>
            <td>{{ $employer->gender=='m' ? __('variables.gender.male') : __('variables.gender.female') }}</td>
            <td>{{ $employer->salary }}</td>
            <td>{{ $employer->departmentsStr() }}</td>
            <td>
                <a class="btn btn-primary" href="{{route('employers.edit-form',['id' => $employer->id])}}" title="@lang('variables.buttons.edit')">
                    <span><i class="fa fa-pencil-square-o"></i></span>
                </a>
                <a class="btn btn-primary btn-delete" href="#modal-container-delete" data-toggle="modal" title="@lang('variables.buttons.del')" data-route="{{route('employers.delete', ['id' =>$employer->id])}}">
                    <span><i class="fa fa-trash"></i></span>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>