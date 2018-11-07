<div class="col-md-4 dimmer">
    <img src="{{ asset('images/dimmer.jpg') }}">
    <div class="title">
        <h1>{{ $title }}</h1>
    </div>
    <div class="count">
        <span class="circle">{{ $count }}</span>
    </div>
    <div class="description">
        You have {{ $count }} {{ $title }} in your database. Click on button below to view all {{$title}}s. Enjoy it!!!
    </div>
    <div class="button">
        <a href="{{ $router }}"><button class="btn  btn-primary">View all {{$title}}s</button></a>
    </div>
</div>