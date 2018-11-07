@extends('layouts.app')
@section('body_class', 'home')
@section('content')
    @include('components.slide')
    @include('components.site-info')
    <div id="features" class="showProduct">
        <div class="container">
            <div class="title-bar">
                <i class="fa fa-chevron-left arrowLeft" aria-hidden="true"></i>
                <div class="title">
                    <ul>
                        <li class="active">Fetured</li>
                        <li>New Itme</li>
                        <li>Top Seller</li>
                        <li>Top Ratting</li>
                    </ul>
                </div>
                <i class="fa fa-chevron-right arrowRight" aria-hidden="true"></i>
            </div>
            <div class="content">
                @include('templates.add-to-cart', ['products' => $firstProduct, 'count' => count($firstProduct)])
                <div class="clearfix"></div>
                <div class="col-md-6">
                    <div class="row">
                        <img src="{{ asset('images/offer.png') }}">
                        <div class="offer">
                            <div class="currentPrice">
                                $2300
                            </div>
                            <div class="salePrice">
                                $1150
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <h1>50% OFF </h1>
                        <h2>For walton Primo GH+ </h2>
                        <h3>Power packed performance</h3>
                        <h4>Powered by a mighty 1.3 GHz Quad Core Processor and 1 GB fast RAM, the Primo GH+ allows seamless
                            multitasking,
                            faster webpage loading, smoother UI transition and ultra fast power-up</h4>
                        <div class="text-center">
                            <div class="count-down">
                                <div class="count">
                                    23
                                </div>
                                <div class="down">
                                    Days
                                </div>
                            </div>
                            <div class="count-down">
                                <div class="count">
                                    10
                                </div>
                                <div class="down">
                                    Hours
                                </div>
                            </div>
                            <div class="count-down">
                                <div class="count">
                                    23
                                </div>
                                <div class="down">
                                    Minutes
                                </div>
                            </div>
                            <div class="count-down">
                                <div class="count">
                                    23
                                </div>
                                <div class="down">
                                    Seconds
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    @include('components.subscribe')
    <div id="laptop" class="showProduct">
        <div class="container">
            <div class="title-bar">
                <i class="fa fa-chevron-left arrowLeft" aria-hidden="true"></i>
                <div class="title">
                    <ul>
                        @foreach($categorys as $k => $category)
                            <li  class="@if ($k == 0) active @endif tabCategory" data-slug="{{$category->slug}}">
                                <a>{{$category->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <i class="fa fa-chevron-right arrowRight" aria-hidden="true"></i>
            </div>
            <div class="content">
                @include('templates.add-to-wish-list', ['products' => $firstProduct, 'count' => count($firstProduct)])
            </div>
        </div>
    </div>
@endsection