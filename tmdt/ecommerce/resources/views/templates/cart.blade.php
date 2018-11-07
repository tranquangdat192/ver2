<div class="container">
    @if($order['count'] == 0)
        <div class="col-md-9">
            No product in your cart
        </div>
    @else
        <div class="col-md-9">
            <div class="title">
                SHOPPING CART
            </div>
            @foreach($order['content'] as $item)
                <div class="order" data-id="{{$item->id}}">
                    <div class="col-md-3 image">
                        <div class="thumb"
                             style="background-image: url('{{ asset('storage/'.$item->options->image) }}')"></div>
                    </div>
                    <div class="col-md-7 detail">
                        <div class="name">{{$item->name}}</div>
                        <div class="options">Color: <span class="green">Black</span></div>
                        <div class="qty">Quanlity:
                            <i class="fa fa-minus minus" aria-hidden="true"></i>
                            <input type="number" class="editCart" value="{{$item->qty}}">
                            <i class="fa fa-plus plus" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-md-2 price text-center">
                        <div class="content">
                            <div>${{$item->price * $item->qty}}</div>
                            <img class="removeCart" src="{{ asset('images/close.png') }}">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            @endforeach
        </div>
    @endif
        <div class="col-md-3">
            <div class="result">
                <span class="name">Total: </span>
                <span class="green">${{$order['total']}}</span>
            </div>
            <div class="button text-center">
                <div class="background-button">
                    <span><a href="{{ route('checkout') }}">Proceed to checkout</a></span>
                </div>
            </div>
        </div>
    </div>
