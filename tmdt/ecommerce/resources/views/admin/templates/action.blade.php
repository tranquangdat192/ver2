<a href="{{ route('adminEdit',['slug' => $slug, 'id' => $id]) }}"><button class="btn btn-warning">Edit</button></a>
<button class="btn btn-danger deleteItem" data-id="{{$id}}" data-toggle="modal" data-target="#delete-modal" data-backdrop="static">Delete</button>