<table class="table">
    <thead>
    <tr>
        <th>название</th>
        <th>кол-во сотрудников</th>
        <th>макс.зарплата среди сотрудников</th>
        <th>действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($departments as $department)
    <tr>
        <td>{{ $department->name }}</td>
        <td>{{ $department->employerDepartments->count() }}</td>
        <td>{{ $department->maxSalary() }}</td>
        <td>
            <a class="btn btn-primary btn-edit" href="#modal-container-edit-department" data-toggle="modal" data-params="{{json_encode($department->toArray())}}" title="изменить отдел">
                <span><i class="fa fa-pencil-square-o"></i></span>
            </a>
            <a class="btn btn-primary btn-delete" href="#modal-container-delete-department" data-toggle="modal" title="удалить отдел" data-id="{{$department->id}}">
                <span><i class="fa fa-trash"></i></span>
            </a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>