<div class="sidebar">
    <div class="name">
        category
    </div>
    <div class="col-md-12 magin-bottom-30">
        <ul class="side-box">
            @foreach($categorys as $category)
                <li class="@if (Request::route('slug') == $category->slug) active @endif">
                    <a href="{{ route('category',['slug' => $category->slug]) }}">{{$category->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="clearfix"></div>
<div class="sidebar" id="brand">
    <div class="name">
        by brand
    </div>
    <div class="col-md-12 magin-bottom-30">
        <ul class="side-box check-box">
            @foreach($brands as $brand)
                <li class="checkSearch" data-id="{{$brand->id}}">{{$brand->name}}</li>
            @endforeach
        </ul>
    </div>
</div>
<div class="clearfix"></div>
<div class="sidebar" id="price">
    <div class="name">
        by price
    </div>
    <div class="col-md-12 magin-bottom-30">
        <ul class="side-box">
            <li class="checkSearch" data-min-price="0" data-max-price="1000"><a>$0000 - $1000</a></li>
            <li class="checkSearch" data-min-price="1001" data-max-price="2000"><a>$1000 - $2000</a></li>
            <li class="checkSearch" data-min-price="2001" data-max-price="3000"><a>$2000 - $3000</a></li>
            <li class="checkSearch" data-min-price="3001" data-max-price="4000"><a>$3000 - $4000</a></li>
            <li class="checkSearch" data-min-price="4001" data-max-price="5000"><a>$4000 - $5000</a></li>
            <li class="checkSearch" data-min-price="5001" data-max-price="6000"><a>$5000 - $6000</a></li>
        </ul>
    </div>
</div>