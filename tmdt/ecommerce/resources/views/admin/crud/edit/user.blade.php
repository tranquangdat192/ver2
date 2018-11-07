<h1>Edit:</h1>
<form method="post" action="{{route('edit')}}" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$model->name}}" required>
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <span class="preview-image">
            <img src="{{asset('storage/'.$model->avatar)}}">
        </span>
        <input type="file" class="form-control image-button" id="avatar" name="avatar" accept="image/*">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" maxlength = "10" value="{{$model->phone}}">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{$model->address}}">
    </div>
    @if($model->id != '1')
        <div class="form-group">
            <label for="role_id">Role</label>
            <select class="form-control" id="role_id" name="role_id">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" @if($model->role_id == $role->id) selected @endif>{{ $role->display_name }}</option>
                @endforeach
            </select>
        </div>
    @endif
    <input type="hidden" name="id" value="{{$model->id}}">
    <input type="hidden" name="model" value="{{$slug}}">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <button type="submit" class="btn btn-primary submitEdit">Save</button>
</form>