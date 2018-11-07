<h1>Edit:</h1>
<form method="post" action="{{route('edit')}}" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="company">Company</label>
        <input type="text" class="form-control" id="company" name="company" value="{{$model->company}}" required>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <span class="preview-image">
            <img src="{{asset('storage/'.$model->images)}}">
        </span>
        <input type="file" class="form-control image-button" id="image" name="image" accept="image/*">
    </div>
    <div class="form-group">
        <label for="position">Position</label>
        <select class="form-control" id="position" name="position">
            <option value="Footer" @if($model->position == "Footer") selected @endif>Footer</option>
            <option value="Product" @if($model->position == "Product") selected @endif>Product</option>
            <option value="Detail" @if($model->position == "Detail") selected @endif>Detail</option>
        </select>
    </div>
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