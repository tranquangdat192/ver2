<thead>
    <tr>
        <th scope="col">
            <input type="checkbox" class="allCheck">
        </th>
        <th scope="col">
            Name
        </th>
        <th scope="col">
            Image
        </th>
        <th scope="col">
            Thumbnail
        </th>
        <th scope="col">
            Price
        </th>
        <th scope="col">
            Discount
        </th>
        <th scope="col">
            Quantity
        </th>
        <th scope="col">
            Brand
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
            <td scope="row" class="name">
                {{$model->name}}
            </td>
            <td scope="row" class="image">
                <img src="{{ asset('storage/'.$model->image) }}">
            </td>
            <td scope="row" class="thumb">
                @if($model->thumb)
                    @foreach($model->thumb as $thumb)
                        <img src="{{ asset('storage/'.$thumb) }}">
                    @endforeach
                @endif
            </td>
            <td scope="row">
                {{$model->price}}
            </td>
            <td scope="row">
                {{$model->discount}}
            </td>
            <td scope="row">
                {{$model->quantity}}
            </td>
            <td scope="row">
                {{$model->brandId->name}}
            </td>
            <td scope="col">
                @include('admin.templates.action', ['id' => $model->id, 'slug' => $slug])
            </td>
        </tr>
    @endforeach
</tbody>