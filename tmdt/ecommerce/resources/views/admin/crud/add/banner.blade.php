<h1>Add:</h1>
<form method="post" action="{{route('add')}}" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="company">Company</label>
        <input type="text" class="form-control" id="company" name="company"  required>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <span class="preview-image imageInvoice"></span>
        <input type="file" class="form-control image-button" id="image" name="image" accept="image/*" required>
    </div>
    <div class="form-group">
        <label for="position">Position</label>
        <select class="form-control" id="position" name="position">
                <option value="Footer" selected>Footer</option>
                <option value="Product">Product</option>
                <option value="Detail">Detail</option>
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