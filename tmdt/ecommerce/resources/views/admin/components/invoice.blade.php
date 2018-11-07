<thead>
<tr>
    <th scope="col">
        User
    </th>
    <th scope="col">
        Guest
    </th>
    <th scope="col">
        Detail
    </th>
    <th scope="col">
        Total
    </th>
    <th scope="col">
        Status
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
            @if($model->userId)
                {{$model->userId->email}}
            @endif
        </td>
        <td scope="row">
            @if($model->guestId)
                {{$model->guestId->email}}
            @endif
        </td>
        <td scope="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">
                            Image
                        </th>
                        <th scope="col">
                            Name
                        </th>
                        <th scope="col">
                            Qty
                        </th>
                        <th scope="col">
                            Price
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(json_decode($model->detail) as $item)
                        <tr>
                            <td scope="row">
                                <img src="{{ asset('storage/'.$item->image) }}">
                            </td>
                            <td scope="row">
                                {{$item->name}}
                            </td>
                            <td scope="row">
                                {{$item->qty}}
                            </td>
                            <td scope="row">
                                ${{$item->price}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </td>
        <td scope="row">
            ${{$model->total}}
        </td>
        <td scope="row">
            {{$model->status}}
        </td>
        <td scope="col">
            <a href="{{ route('adminEdit',['slug' => $slug, 'id' => $model->id]) }}"><button class="btn btn-warning">Edit</button></a>
        </td>
    </tr>
@endforeach
</tbody>