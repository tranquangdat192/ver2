<thead>
<tr>
    <th scope="col">
        <input type="checkbox" class="allCheck">
    </th>
    <th scope="col">
        Company
    </th>
    <th scope="col">
        Image
    </th>
    <th scope="col">
        Position
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
            <input type="checkbox" value="{{$model->id}}">
        </td>
        <td scope="row">
            {{$model->company}}
        </td>
        <td scope="row" class="imageBanner">
            <img src="{{ asset('storage/'.$model->image) }}">
        </td>
        <td scope="row">
            {{$model->position}}
        </td>
        <td scope="col">
            @include('admin.templates.action', ['id' => $model->id, 'slug' => $slug])
        </td>
    </tr>
@endforeach
</tbody>