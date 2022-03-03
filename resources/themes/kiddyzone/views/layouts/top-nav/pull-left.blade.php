<div class="top-left pull-left">
    
</div>
<div class="top-right pull-right">
    <div class="head-social-media for-desktop">
        <a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/topnav/facebook.svg') }}"></a>
        <a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/topnav/instagram.svg') }}"></a>
        <a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/topnav/linkedin.svg') }}"></a>
        <a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/topnav/twitter.svg') }}"></a>
    </div>
    <div class="currency">
        <form action="#" method="post" enctype="multipart/form-data" id="currency">
            <div class="btn-group">
                <button class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><img src="{{ asset('/themes/kiddyzone/assets/images/topnav/united-arab-emirates.svg') }}"> <strong>USD</strong> <img class="down-arrow" src="{{ asset('/themes/kiddyzone/assets/images/topnav/down-arrow.svg') }}"> </button>
                <ul class="dropdown-menu">
                <li><a href="#">Euro</a></li>
                <li><a href="#">Pound</a></li>
                <li><a href="#">USD</a></li>
                </ul>
            </div>
        </form>
    </div>
    <div class="language">
        <form action="#" method="post" enctype="multipart/form-data" id="language">
        <div class="btn-group">
            <button class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img class="lang-flag" src="{{ asset('/themes/kiddyzone/assets/images/topnav/640px-Flag_of_the_United_Kingdom.svg.png') }}"> English <img class="down-arrow" src="{{ asset('/themes/kiddyzone/assets/images/topnav/down-arrow.svg') }}"></button>
            <ul class="dropdown-menu">
            <li><a href="#">Arabic</a></li>
            <li><a href="#"> English</a></li>
            </ul>
        </div>
        </form>
    </div>
    <div id="top-links" class="nav pull-right">
        <ul class="list-inline row">
            <li class="account for-desktop">
            @auth('customer')
            <a class="unset" href="{{ route('customer.deshbroad.index') }}">
                {{ __('velocity::app.responsive.header.greeting', ['customer' => auth()->guard('customer')->user()->first_name]) }}
            </a>
      
                <a
                    class="unset"
                    href="{{ route('customer.session.destroy') }}">
                    <img src="{{ asset('/themes/kiddyzone/assets/images/topnav/user (1).svg') }}">
                    <span>{{ __('shop::app.header.logout') }}</span>
                </a>

            @endauth
            @guest('customer')
                <a href="{{ route('customer.session.index') }}">
                    <img src="{{ asset('/themes/kiddyzone/assets/images/topnav/user (1).svg') }}">
                    <span>Login</span>
                </a>
                
                <span class="account-ver-line">|</span>
                <a href="{{ route('customer.register.index') }}">
                    <span>Register</span>
                </a>
            @endguest
            </li>
            <li> @include('velocity::layouts.top-nav.carts-wishlist-item')</li>
        </ul>
        </div>
    </div> 
</div>

