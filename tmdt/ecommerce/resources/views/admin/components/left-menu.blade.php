<div id="left-menu" class="col-md-2">
    <div class="logo">
        <a href="{{ route('admin') }}">
            <img src="{{ asset('images/logoAdmin.png') }}">
        </a>
    </div>
    <div class="menu list-group">
        <ul>
            <a href="{{ route('admin') }}" class="list-group-item @if (Request::route()->getName() == 'admin') active @endif">
                <li>
                    Dashboard
                </li>
            </a>
            <a href="{{ route('adminDetail',['slug' => 'category']) }}" class="list-group-item @if (Request::route('slug') == 'category') active @endif">
                <li>
                    Category
                </li>
            </a>
            <a href="{{ route('adminDetail',['slug' => 'brand']) }}" class="list-group-item @if (Request::route('slug') == 'brand') active @endif">
                <li>
                    Brand
                </li>
            </a>
            <a href="{{ route('adminDetail',['slug' => 'product']) }}" class="list-group-item @if (Request::route('slug') == 'product') active @endif">
                <li>
                    Product
                </li>
            </a>
            <a href="{{ route('adminDetail',['slug' => 'invoice']) }}" class="list-group-item @if (Request::route('slug') == 'invoice') active @endif">
                <li>
                    Invoice
                </li>
            </a>
            <a href="{{ route('adminDetail',['slug' => 'banner']) }}" class="list-group-item @if (Request::route('slug') == 'banner') active @endif">
                <li>
                    Banner
                </li>
            </a>
            <a href="{{ route('adminDetail',['slug' => 'user']) }}" class="list-group-item @if (Request::route('slug') == 'user') active @endif">
                <li>
                    User
                </li>
            </a>
            <a href="{{ route('adminDetail',['slug' => 'guest']) }}" class="list-group-item @if (Request::route('slug') == 'guest') active @endif">
                <li>
                    Guest
                </li>
            </a>
        </ul>
    </div>
</div>