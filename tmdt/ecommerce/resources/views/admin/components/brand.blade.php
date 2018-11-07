<thead>
    <tr>
        <th scope="col">
            <input type="checkbox" class="allCheck">
        </th>
        <th scope="col">
            Name
        </th>
        <th scope="col">
            Slug
        </th>
        <th scope="col">
            Category
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
                {{$model->name}}
            </td>
            <td scope="row">
                {{$model->slug}}
            </td>
            <td scope="row">
                {{$model->categoryId->name}}
            </td>
            <td scope="col">
                @include('admin.templates.action', ['id' => $model->id, 'slug' => $slug])
            </td>
        </tr>
    @endforeach
</tbody>