@extends('admin.layouts.app')
@section('body_class', 'admin')
@section('content')
    @include('admin.components.left-menu')
    <div id="content" class="col-md-10">
        <div class="top">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin') }}">Admin</a></li>
                <li class="active">{{ ucwords(Request::route('slug')) }}</li>
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
        @if($slug != 'guest' && $slug != 'invoice')
            <div class="crud">
                Choose: <a href="{{ route('adminAdd',['slug' => $slug]) }}"><button class="btn btn-success">Add New</button></a>
                <button class="btn btn-danger deleteAll" data-toggle="modal" data-target="#bulk-modal" data-backdrop="static">Bulk Delete</button>
            </div>
        @endif
        @include('admin.templates.detail',['models' => $models, 'slug' => $slug])
    </div>
    @include('modal.delete',['model' => $slug])
    @include('modal.bulk',['model' => $slug])
@endsection