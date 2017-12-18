<table class="table">
    <thead>
    <tr>
        <th>фамилия</th>
        <th>имя</th>
        <th>отчество</th>
        <th>пол</th>
        <th>зарплата</th>
        <th>отделы, где работает</th>
        <th>действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($employers as $employer)
        <tr>
            <td>{{ $employer->last_name }}</td>
            <td>{{ $employer->first_name }}</td>
            <td>{{ $employer->middle_name }}</td>
            <td>{{ $employer->gender=='m' ? 'мужчина' : 'женщина' }}</td>
            <td>{{ $employer->salary }}</td>
            <td>{{ $employer->departmentsStr() }}</td>
            <td>
                <a class="btn btn-primary" href="{{route('employers.edit-form',['id' => $employer->id])}}" title="изменить сотрудника">
                    <span><i class="fa fa-pencil-square-o"></i></span>
                </a>
                <a class="btn btn-primary btn-delete" href="#modal-container-delete" data-toggle="modal" title="удалить сотрудника" data-id="{{$employer->id}}" data-route="{{route('employers.delete')}}">
                    <span><i class="fa fa-trash"></i></span>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>