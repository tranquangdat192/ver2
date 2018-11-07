<i class="fa fa-shopping-cart cart" aria-hidden="true"></i>
<span class="circle">{{$cart['count']}}</span>
<div class="drop">
    @if($cart['count'] > 0)
        <div class="col-md-12 magin-bottom-15">
            <div class="title text-center">
                Showing {{$cart['count']}} of {{$cart['count']}} items added
            </div>
            <hr>
            @foreach($cart['content'] as $k => $item)
            <div class="order" data-id="{{$item->id}}">
                <div class="col-md-3">
                    <a href="{{ route('product',['slug' => $item->id]) }}">
                        <img src="{{ asset('storage/'.$item->options->image) }}">
                    </a>
                </div>
                <div class="col-md-5 detail">
                    <div title="{{ $item->name }}"><a href="{{ route('product',['slug' => $item->id]) }}">{{ str_limit($item->name, $limit = 10, $end = '...') }}</a></div>
                    <div>Color: <span class="green">Black</span></div>
                    <div>Quanlity: <span class="green">{{$item->qty}}</span></div>
                </div>
                <div class="col-md-4 price text-center">
                    <div>${{$item->price * $item->qty}}</div>
                    <img class="removeCart" src="{{ asset('images/close.png') }}">
                </div>
            </div>
            <div class="border"></div>
            @endforeach
        </div>
        <div class="result">
            <p>Total excluding delivry: </p>
            <p class="green">${{$cart['total']}}</p>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 quick-cart">
            <div class="col-md-3 button quick text-center">
                <div class="background-button">
                    <span><a href="{{ route('shopping-cart') }}">View Cart</a></span>
                </div>
            </div>
            <div class="col-md-9 button backgroundGray quick text-center">
                <div class="background-button">
                                    <span class="continue"><a href="{{ route('checkout') }}">Continue To Checkout</a> <i class="fa fa-angle-double-right"
                                                                                   aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-12 text-center noProduct">No product in your cart</div>
    @endif
</div>