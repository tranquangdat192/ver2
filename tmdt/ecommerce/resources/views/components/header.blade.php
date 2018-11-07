<header>
    <nav id="top-nav">
        <div class="container">
            <div id="my-menu">
                <a href="{{ route('home') }}" class="@if (Request::route()->getName() == 'home' || Request::is('home/*'))active @endif">
                    <i class="fa fa-home" aria-hidden="true"></i> Home
                </a>
                <a href="{{ route('account') }}" class="@if (Request::route()->getName() == 'account') active @endif">
                    <i class="fa fa-user-o" aria-hidden="true"></i> My Account
                </a>
                <a href="{{ route('shopping-cart') }}" class="@if (Request::route()->getName() == 'shopping-cart') active @endif">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
                </a>
                <a href="{{ route('checkout') }}" class="@if (Request::route()->getName() == 'checkout') active @endif">
                    <i class="fa fa-check" aria-hidden="true"></i> Checkout
                </a>
            </div>
            <div class="menu-right">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="lang"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <span class="image"><img src="{{ asset('images/eng.png') }}"></span>English
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="lang">
                        <li><a href="#">English</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="currency"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <span class="image usd">$</span>Doller
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="currency">
                        <li><a href="#">Doller</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div id="account-cart">
            <div class="logo">
                LOGO
            </div>
            <div class="account-cart">
                <span class="account btn-group">
                    @if(Auth::check())
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            {{Auth::user()->name}}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    @else
                        <a href="{{ route('login') }}">LOG IN</a> or <a href="{{ route('register') }}">CREATE ACCOUNT</a>
                    @endif
                </span>
                <div class="list" id="wish-list">
                    @include('templates.wish-list')
                </div>
                <div class="list" id="quick-cart">
                    @include('templates.quick-cart')
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div id="primary-menu">
        <div class="container">
            <div class="menu">
                <ul>
                    @foreach($categorys as $category)
                        <li  class="@if (Request::route('slug') == $category->slug) active @endif">
                            <a href="{{ route('category',['slug' => $category->slug]) }}">{{$category->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="search">
                <input type="text" placeholder="Search Your Item.......">
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</header>