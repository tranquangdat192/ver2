@extends('admin.layouts.app')
@section('body_class', 'admin')
@section('content')
    @include('admin.components.left-menu')
    <div id="content" class="col-md-10">
        <div class="top">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin') }}">Admin</a></li>
                <li class="active"> Dashboard</li>
            </ol>
            <div class="account btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{ route('logoutAdmin') }}">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
        @include('admin.templates.dimmer',['title' => 'Category', 'count' => $category, 'router' => route('adminDetail',['slug' => 'category'])])
        @include('admin.templates.dimmer',['title' => 'Product', 'count' => $product, 'router' => route('adminDetail',['slug' => 'product'])])
        @include('admin.templates.dimmer',['title' => 'Invoice', 'count' => $invoice, 'router' => route('adminDetail',['slug' => 'invoice'])])
    </div>
@endsection
