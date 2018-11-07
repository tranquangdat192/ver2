<h1>Add:</h1>
<form method="post" action="{{route('add')}}" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name"  required>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <span class="preview-image"></span>
        <input type="file" class="form-control image-button" id="image" name="image" accept="image/*" required>
    </div>
    <div class="form-group">
        <label for="thumbnail">Thumbnail</label>
        <span class="gallery"></span>
        <input type="file" class="form-control thumbnail-button" id="thumbnail" name="thumbnail[]" accept="image/*" multiple>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" required>
    </div>
    <div class="form-group">
        <label for="discount">Discount</label>
        <input type="number" class="form-control" id="discount" name="discount" required>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" class="form-control" id="quantity" name="quantity" required>
    </div>
    <div class="form-group">
        <label for="brand">Brand</label>
        <select class="form-control" id="brand" name="brand_id">
            @foreach($allBrand as $k=>$brand)
                <option value="{{$brand->id}}" @if($k == 0) selected @endif>{{$brand->name}}</option>
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