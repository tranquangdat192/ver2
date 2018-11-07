@extends('templates.page')
@section('content')
    <div id="grid" class="information" data-slug="{{$category->slug}}">
        <div class="container">
            <div class="breadcrumb">
                Home / {{$category->name}}
            </div>
            <div class="col-md-9">
                <div class="magin-left-15">
                    <div>
                        <div class="col-md-9 configure">
                            <span>BEST CONFIGURE AND SUPER BRAND</span>
                        </div>
                        <div class="col-md-3 text-center upto">
                            <span>UP TO 50% OFF</span>
                        </div>
                        <div class="clearfix"></div>
                        <div class="showProduct">
                            <div class="content">
                                @include('templates.add-to-cart', ['products' => $products, 'count' => $count])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @include('templates.sidebar')
                <div class="clearfix"></div>
                @include('templates.banner')
            </div>
        </div>
    </div>
@endsection