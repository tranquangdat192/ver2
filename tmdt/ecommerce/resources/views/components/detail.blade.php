@extends('templates.page')
@section('content')
    <div id="single" class="information">
        <div class="container">
            <div class="breadcrumb">
                Home / {{$product->brandId->categoryId->name}} / {{$product->brandId->name}}
            </div>
            <div class="col-md-9">
                <div class="col-md-5 magin-left-30">
                    <div class="image">
                        <img src="{{ asset('storage/'.$product->image) }}">
                        <div class="bage">
                            <img src="{{ asset('images/bage.png') }}">
                        </div>
                        <p class="text-bage">SALE</p>
                    </div>
                    <div class="thumb">
                        <div class="arrow-left">
                            <img src="{{ asset('images/leftthumb.png') }}">
                        </div>
                        @if($product->thumb)
                            @foreach($product->thumb as $k=>$image)
                                @if($k < 3)
                                    <div class="imgthumb @if($k % 3 == 2) magin-right-0 @endif">
                                        <img src="{{ asset('storage/'.$image) }}">
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="imgthumb">
                                <img src="{{ asset('images/com.png') }}">
                            </div>
                            <div class="imgthumb">
                                <img src="{{ asset('images/com.png') }}">
                            </div>
                            <div class="imgthumb magin-right-0">
                                <img src="{{ asset('images/com.png') }}">
                            </div>
                        @endif
                        <div class="arrow-right">
                            <img src="{{ asset('images/rightthumb.png') }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="name">
                        {{$product->name}}
                    </div>
                    <div class="rate">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        1 Review
                    </div>
                    <hr>
                    <div class="col-md-4">
                        Menufacturer :
                    </div>
                    <div class="col-md-8">
                        {{$product->brandId->name}}
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-4">
                        Availability :
                    </div>
                    <div class="col-md-8">
                        <span class="green">in stock</span> {{$product->quantity}} item(s)
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-4">
                        Product Code :
                    </div>
                    <div class="col-md-8">
                        PC03
                    </div>
                    <div class="clearfix"></div>
                    <div class="sub-name">
                        Product Dimensions and Weight
                    </div>
                    <div class="col-md-4">
                        Product Lenght :
                    </div>
                    <div class="col-md-8">
                        10.0000m
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-4">
                        Product Weight :
                    </div>
                    <div class="col-md-8">
                        10.0000kg
                    </div>
                    <hr>
                    <div class="clearfix"></div>
                    <p class="description">
                        Lorem ipsum dolor sit amet, debet saperet tacimates no vix. Illum menandri oportere vim an.
                        Ei sed nostro prompta evertitur, has munere fabulas torquatos no. Et error persecuti eos, ea regione.
                    </p>
                    <hr>
                    <div class="price">
                        <span class="cost">${{$product->price}}</span>
                        <span class="sale green">${{$product->sale_price}}</span>
                    </div>
                    <div class="cart">
                        <div class="button text-center addToCart" data-toggle="modal" data-target="#add-to-cart-modal" data-id="{{$product->id}}">
                            <div class="background-button">
                                <span><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart</span>
                            </div>
                        </div>
                        <div class="button button-style width-50 text-center">
                            <div class="background-button">
                                <span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="button button-style width-50 text-center">
                            <div class="background-button">
                                <span><i class="fa fa-exchange padding8" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="button button-style width-50 text-center">
                            <div class="background-button">
                                <span><i class="fa fa-question" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="share magin-left-15">
                    Share this <img src="{{ asset('images/fb.png') }}"><img src="{{ asset('images/tw.png') }}"><img src="{{ asset('images/gg.png') }}"><img
                            src="{{ asset('images/pin.png') }}">
                </div>
                <div>
                    <div class="col-md-12">
                        <div class="tab">
                            <div class="col-md-2">
                                Description
                            </div>
                            <div class="col-md-2">
                                Specification
                            </div>
                            <div class="col-md-2">
                                Reviews
                            </div>
                            <div class="col-md-2">
                                Custom tab
                            </div>
                        </div>
                        <div class="col-md-12 detail">
                            <div>
                                Last view
                            </div>
                            <hr>
                            <div class="time">
                                <span>By Bin Burhan</span>
                                <span><i class="fa fa-clock-o" aria-hidden="true"></i> 10:05pm</span>
                                <span><i class="fa fa-bell-o" aria-hidden="true"></i> Sunday</span>
                                <span><i class="fa fa-calendar-o" aria-hidden="true"></i> 26 Decembar</span>
                                <span class="box-star">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </span>
                            </div>
                            <div class="context">
                                Lorem ipsum dolor sit amet, debet saperet tacimates no vix. Illum menandri oportere vim an.
                                Ei sed nostro prompta evertitur, has munere fabulas torquatos no. Et error persecuti eos,
                                ea regione rationibus efficiantur est. Populo vidisse debitis ne nec, no labore equidem sea.
                                An senserit honestatis eum, nam diceret vituperatoribus ad.
                                In error prompta referrentur sea, debet alienum sed no.
                                Ullum doctus alienum usu an, ius in iudico civibus mentitum. Cu everti cetero sit.
                                Eu usu sapientem assueverit quaerendum, et similique intellegat sit, an tincidunt adolescens
                                quaerendum est.
                                Has an duis deserunt, commodo platonem consequuntur vel ea. Phaedrum antiopam sea at, ei vix
                                stet nostrum.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @include('templates.sidebar')
            </div>
        </div>
    </div>
@endsection