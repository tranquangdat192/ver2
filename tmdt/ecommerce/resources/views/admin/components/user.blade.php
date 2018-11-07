<thead>
    <tr>
        <th scope="col">
            <input type="checkbox" class="allCheck">
        </th>
        <th scope="col">
            Name
        </th>
        <th scope="col">
            Email
        </th>
        <th scope="col">
            Avatar
        </th>
        <th scope="col">
            Phone
        </th>
        <th scope="col">
            Address
        </th>
        <th scope="col">
            Role
        </th>
        <th scope="col">
            Action
        </th>
    </tr>
</thead>
<tbody>
    @foreach($models as $model)
        <tr>
            <td scope="row">
                @if($model->id != '1')
                    <input type="checkbox" value="{{$model->id}}">
                @endif
            </td>
            <td scope="row">
                {{$model->name}}
            </td>
            <td scope="row">
                {{$model->email}}
            </td>
            <td scope="row" class="image">
                <img src="{{ asset('storage/'.$model->avatar) }}">
            </td>
            <td scope="row">
                {{$model->phone}}
            </td>
            <td scope="row">
                {{$model->address}}
            </td>
            <td scope="row">
                {{$model->role->display_name}}
            </td>
            <td scope="col">
                @include('admin.templates.action', ['id' => $model->id, 'slug' => $slug])
            </td>
        </tr>
    @endforeach
</tbody>