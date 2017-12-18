<table class="table">

    <!-- Table Headings -->
    <thead>
    <th></th>
    @foreach ($departments as $department)
        <th>{{ $department->name }}</th>
    @endforeach
    </thead>

    <!-- Table Body -->
    <tbody>
    @foreach ($employers as $employer)
        <tr>
            <th>
                {{ $employer->last_name }} {{ $employer->first_name }} {{ $employer->middle_name }}
            </th>
            @foreach ($departments as $department)
                <td style="text-align: center">
                    @if(in_array($department->id , ($employer->departments) ? $employer->departments->pluck('id')->toArray() : []))
                        <span><i class="fa fa-check"></i></span>
                    @endif
                </td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>