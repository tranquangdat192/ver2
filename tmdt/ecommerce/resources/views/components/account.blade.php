@extends('templates.page')
@section('content')
    <div id="account" class="information">
        <div class="container">
            @if(Auth::check())
                <p>{{ $user->name }}</p>
                <p>{{ $user->email }}</p>
            @else
                You are not logged in
            @endif
        </div>
    </div>
@endsection