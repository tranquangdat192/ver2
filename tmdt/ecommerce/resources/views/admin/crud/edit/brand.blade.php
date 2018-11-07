<h1>Edit:</h1>
<form method="post" action="{{route('edit')}}">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$model->name}}" required>
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{$model->slug}}" required>
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control" id="category" name="category_id">
            @foreach($allCategory as $category)
            <option value="{{$category->id}}" @if($category->id == $model->category_id) selected @endif>{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <input type="hidden" name="id" value="{{$model->id}}">
    <input type="hidden" name="model" value="{{$slug}}">
    <button type="submit" class="btn btn-primary submitEdit">Save</button>
</form>