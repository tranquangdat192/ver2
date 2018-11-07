@extends('admin.layouts.app')
@section('body_class', 'admin')
@section('content')
    @include('admin.components.left-menu')
    <div id="content" class="col-md-10">
        <div class="top">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin') }}">Admin</a></li>
                <li><a href="{{route('adminDetail', ['slug' => $slug])}}">{{ ucwords(Request::route('slug')) }}</a></li>
                <li class="active">{{$model->id}}</li>
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
        <div id="edit">
            @include('admin.crud.edit.'.$slug, ['model' => $model])
        </div>
    </div>
@endsection