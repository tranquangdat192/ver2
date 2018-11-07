<table class="table table-hover">
    @if($slug == 'category')
        @include('admin.components.category', ['slug' => $slug])
    @elseif($slug == 'brand')
        @include('admin.components.brand', ['slug' => $slug])
    @elseif($slug == 'banner')
        @include('admin.components.banner', ['slug' => $slug])
    @elseif($slug == 'invoice')
        @include('admin.components.invoice', ['slug' => $slug])
    @elseif($slug == 'product')
        @include('admin.components.product', ['slug' => $slug])
    @elseif($slug == 'user')
        @include('admin.components.user', ['slug' => $slug])
    @elseif($slug == 'guest')
        @include('admin.components.guest', ['slug' => $slug])
    @endif
</table>
{{ $models->links() }}
