<footer>
    <div class="container">
        <div class="row">
            <div class="ourBrand">
                <div class="brand text-center">
                    <div class="background-brand">
                        <span>OUR BRAND</span>
                    </div>
                </div>
                <div class="slide">
                    @foreach($bannerFooters as $k=>$banner)
                        @if($k < 6)
                            <div class="col-md-2">
                                <span class="helper"></span><img src="{{ asset('storage/'.$banner->image) }}">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="info">
                <div class="col-md-3">
                    <div class="title">
                        INFORMATION
                    </div>
                    <hr>
                    <ul>
                        <li><a href="">ABOUT US</a></li>
                        <li><a href="">CUSTOMAR SERVICE</a></li>
                        <li><a href="">PRIVACY POLICY</a></li>
                        <li><a href="">SITE MAP</a></li>
                        <li><a href="">CONTACT</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="title">
                        WHY BUY FROM US
                    </div>
                    <hr>
                    <ul>
                        <li><a href="">ABOUT US</a></li>
                        <li><a href="">SHIPPING & RETURNS</a></li>
                        <li><a href="">INTERNATIONAL SHIPPING</a></li>
                        <li><a href="">AFFILIATES</a></li>
                        <li><a href="">GROUP SALES</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="title">
                        MY ACCOUNT
                    </div>
                    <hr>
                    <ul>
                        <li><a href="">SIGN IN</a></li>
                        <li><a href="">VIEW CART</a></li>
                        <li><a href="">MY WISHLIST</a></li>
                        <li><a href="">TRACK MY ORDER</a></li>
                        <li><a href="">HELP</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="title">
                        CONTACT
                    </div>
                    <hr>
                    <div class="contact">
                        <div class="col-md-2 text-center">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="col-md-10">
                            EAST BOX NAGAR, SARULIA DEMRA, DHAKA-1361
                        </div>
                    </div>
                    <div class="contact">
                        <div class="col-md-2 text-center">
                            <i class="fa fa-mobile" aria-hidden="true"></i>
                        </div>
                        <div class="col-md-10">
                            <div>
                                +880 1768760504
                            </div>
                            <div>
                                +880 1735982113
                            </div>
                        </div>
                    </div>
                    <div class="contact">
                        <div class="col-md-2 text-center">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                        <div class="col-md-10">
                            binburhan1@gmail.com
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="card">
        <div class="container">
            <div class="col-md-6">
                <div class="own text-center">
                    <div class="accept">
                        <span>WE ACCEPT</span>
                    </div>
                </div>
                <div>
                    <span class="helper"></span><img src="{{ asset('images/visa.png') }}">
                </div>
                <div>
                    <span class="helper"></span><img src="{{ asset('images/master.png') }}">
                </div>
                <div>
                    <span class="helper"></span><img src="{{ asset('images/american.png') }}">
                </div>
                <div>
                    <span class="helper"></span><img src="{{ asset('images/cirrus.png') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="own text-center">
                    <div class="accept">
                        <span>FOLLOW US</span>
                    </div>
                </div>
                <div>
                    <span class="helper"></span><img src="{{ asset('images/fb.png') }}">
                </div>
                <div>
                    <span class="helper"></span><img src="{{ asset('images/tw.png') }}">
                </div>
                <div>
                    <span class="helper"></span><img src="{{ asset('images/gg.png') }}">
                </div>
                <div>
                    <span class="helper"></span><img src="{{ asset('images/square.png') }}">
                </div>
            </div>
        </div>
    </div>
    <div class="copyright text-center">
        Copyright by: company name
    </div>
</footer>