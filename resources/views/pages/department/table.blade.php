<table class="table">
    <thead>
    <tr>
        <th>@lang('variables.department.columns.name')</th>
        <th>@lang('variables.department.columns.count_employers')</th>
        <th>@lang('variables.department.columns.max_salary')</th>
        <th>@lang('variables.department.columns.actions')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($departments as $department)
    <tr>
        <td>{{ $department->name }}</td>
        <td>{{ $department->employerDepartments->count() }}</td>
        <td>{{ $department->maxSalary() }}</td>
        <td>
            <a class="btn btn-primary btn-edit" href="#modal-container-edit-department" data-toggle="modal" data-params="{{json_encode($department->toArray())}}" title="@lang('variables.buttons.edit')">
                <span><i class="fa fa-pencil-square-o"></i></span>
            </a>
            <a class="btn btn-primary btn-delete" href="#modal-container-delete" data-toggle="modal" title="@lang('variables.buttons.del')" data-route="{{route('departments.delete', ['id' => $department->id])}}">
                <span><i class="fa fa-trash"></i></span>
            </a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>