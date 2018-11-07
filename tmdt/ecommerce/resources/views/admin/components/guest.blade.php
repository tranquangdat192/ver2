<thead>
    <tr>
        <th scope="col">
            Name
        </th>
        <th scope="col">
            Email
        </th>
        <th scope="col">
            Phone
        </th>
        <th scope="col">
            Address
        </th>
    </tr>
</thead>
<tbody>
    @foreach($models as $model)
        <tr>
            <td scope="row">
                {{$model->name}}
            </td>
            <td scope="row">
                {{$model->email}}
            </td>
            <td scope="row">
                {{$model->phone}}
            </td>
            <td scope="row">
                {{$model->address}}
            </td>
        </tr>
    @endforeach
</tbody>