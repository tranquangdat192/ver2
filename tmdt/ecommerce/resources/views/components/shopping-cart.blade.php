@extends('templates.page')
@section('content')
    <div id="shopping-cart" class="information">
    @include('templates.cart', ['order' => ['count' => $count, 'content' => $content, 'total' => $total]])
    </div>
    <div class="clearfix"></div>
@endsection