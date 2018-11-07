<h1>Add:</h1>
<form method="post" action="{{route('add')}}" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <span class="preview-image"></span>
        <input type="file" class="form-control image-button" id="avatar" name="avatar" accept="image/*" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="number" class="form-control" id="phone" name="phone">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address">
    </div>
    <div class="form-group">
        <label for="role_id">Role</label>
        <select class="form-control" id="role_id" name="role_id">
            @foreach($roles as $k=>$role)
                <option value="{{ $role->id }}" @if($k == 1) selected @endif>{{ $role->display_name }}</option>
            @endforeach
        </select>
    </div>
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
    <button type="submit" class="btn btn-primary submitAdd">Add</button>
</form>