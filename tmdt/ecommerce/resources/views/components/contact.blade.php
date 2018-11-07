@extends('templates.page')
@section('content')
    <div id="contact" class="information">
        <div class="container">
            <div class="breadcrumb">
                Home / Desktop / Checkout Information
            </div>
            <div class="col-md-9">
                <div class="title">
                    Contact Information
                </div>
                <hr class="left">
                <div class="sub">
                    Lorem Ipsum is simply dummy text of the printing and typesettin Lorem Ipsum is simply dummy text of the printing and typesettin
                    Lorem Ipsum is simply dummy text of the printing and typesettin Lorem Ipsum is simply dummy text of the printing and typesettin
                </div>
                <div class="input">
                    <div class="col-md-6">
                        <input type="text" name="name" placeholder="Name">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="magin-left-15">
                    <textarea placeholder="Type Your Message" rows="10"></textarea>
                </div>
                <div class="button magin-left-15 text-center">
                    <div class="background-button">
                        <span>send</span>
                    </div>
                </div>
            </div>
            @include('templates.sidebar')
        </div>
    </div>
@endsection