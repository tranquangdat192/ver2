@if($count > 0)
    @foreach($products as $k => $product)
    <div title="{{$product->name}}" class="col-md-4 @if($k % 3 == 0) first @elseif($k % 3 == 2) last @endif">
        <div class="image">
            <a href="{{ route('product',['slug' => $product->id]) }}">
                <img src="{{ asset('storage/'.$product->images) }}">
            </a>
        </div>
        <div class="name">
            {{ str_limit($product->name, $limit = 20, $end = '...') }}
        </div>
        <div class="price text-center">
            <div class="currentPrice">
                ${{$product->price}}
            </div>
            <div class="salePrice">
                ${{$product->sale_price}}
            </div>
        </div>
        <div class="rate text-center">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
        </div>
        <div class="add-to">
            <div class="cart add addToCart padding35" data-toggle="modal" data-target="#add-to-cart-modal" data-id="{{$product->id}}">
                <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                <span class="magin-left-10">Add to cart</span>
            </div>
            <div class="edit gray">
                <i class="fa fa-pencil-square-o padding8" aria-hidden="true"></i>
            </div>
            <div class="exchange gray">
                <i class="fa fa-exchange padding8" aria-hidden="true"></i>
            </div>
        </div>
    </div>
@endforeach
@else
    <p class="text-center">
        No product in website
    </p>
@endif