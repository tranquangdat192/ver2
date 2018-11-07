<h1>Edit:</h1>
<form method="post" action="{{route('edit')}}" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status" name="status">
            <option value="Processing" @if($model->status == "Processing") selected @endif>Processing</option>
            <option value="Complete" @if($model->status == "Complete") selected @endif>Complete</option>
            <option value="Cancel" @if($model->status == "Cancel") selected @endif>Cancel</option>
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