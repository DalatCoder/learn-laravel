@php
    $phone_contact = getConfigValueFromSettingTable('phone_contact');
    $email = getConfigValueFromSettingTable('email');
    $facebook_link = getConfigValueFromSettingTable('facebook_link');
    $twitter_link = getConfigValueFromSettingTable('twitter_link');
    $linkedin_link = getConfigValueFromSettingTable('linkedin_link');
    $dribbble_link = getConfigValueFromSettingTable('dribbble_link');
    $google_plus_link = getConfigValueFromSettingTable('google_plus_link');
@endphp

<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            @if(!empty($phone_contact))
                                <li><a href="tel:{{ $phone_contact }}"><i class="fa fa-phone"></i> {{ $phone_contact }}
                                    </a></li>
                            @endif

                            @if(!empty($email))
                                <li><a href="mailto:{{ $email }}"><i class="fa fa-envelope"></i> {{ $email }}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            @if(!empty($facebook_link))
                                <li><a href="{{ $facebook_link }}"><i class="fa fa-facebook"></i></a></li>
                            @endif

                            @if(!empty($twitter_link))
                                <li><a href="{{ $twitter_link }}"><i class="fa fa-twitter"></i></a></li>
                            @endif

                            @if(!empty($linkedin_link))
                                <li><a href="{{ $linkedin_link }}"><i class="fa fa-linkedin"></i></a></li>
                            @endif

                            @if(!empty($dribbble_link))
                                <li><a href="{{ $dribbble_link }}"><i class="fa fa-dribbble"></i></a></li>
                            @endif

                            @if(!empty($google_plus_link))
                                <li><a href="{{ $google_plus_link }}"><i class="fa fa-google-plus"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="/"><img src="{{ asset('eshopper/images/home/logo.png') }}" alt=""/></a>
                    </div>
                    <div class="btn-group pull-right clearfix">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa"
                                    data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">Canada</a></li>
                                <li><a href="">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa"
                                    data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">Canadian Dollar</a></li>
                                <li><a href="">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href=""><i class="fa fa-user"></i> Account</a></li>
                            <li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            <li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    @include('components.main-menu')
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
