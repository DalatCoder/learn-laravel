<!DOCTYPE html>
<html>
<head>
    <title>Trang quản lý</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" href="{{ asset('server/css/bootstrap.min.css') }}">
    <link href="{{ asset('server/css/style.css') }}" rel='stylesheet' type='text/css'/>
    <link href="{{ asset('server/css/style-responsive.css') }}" rel="stylesheet"/>

    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('server/css/font.css') }}" type="text/css"/>
    <link href="{{ asset('server/css/font-awesome.css') }}" rel="stylesheet">
    <script src="{{ asset('server/js/jquery2.0.3.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('server/css/morris.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('server/css/monthly.css') }}">
    <script src="{{ asset('server/js/raphael-min.js') }}"></script>
    <script src="{{ asset('server/js/morris.js') }}"></script>
</head>
<body>
<section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="index.html" class="logo">
                ADMIN
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->

        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder="Tìm kiếm">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="{{ asset('server/images/2.png') }}">
                        <span class="username">
                            <?php
                            $admin_name = \Illuminate\Support\Facades\Session::get('admin_name');
                            if (!empty($admin_name)) echo $admin_name;
                            ?>
                        </span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="#"><i class=" fa fa-suitcase"></i>Tài khoản</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Cài đặt</a></li>
                        <li><a href="{{ route('admin.logout') }}"><i class="fa fa-key"></i> Đăng xuất</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->

            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->
            <div class="leftside-navigation">
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a class="active" href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-dashboard"></i>
                            <span>Tổng quan</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Danh mục sản phẩm</span>
                        </a>
                        <ul class="sub">
                            <li><a href="typography.html">Thêm danh mục</a></li>
                            <li><a href="glyphicon.html">Liệt kê</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            @yield('content')
        </section>

        <!-- footer -->
        <div class="footer">
            <div class="wthree-copyright">
                <p>© 2021 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
            </div>
        </div>
        <!-- / footer -->
    </section>
    <!--main content end-->

</section>

<script src="{{ asset('server/js/bootstrap.js') }}"></script>
<script src="{{ asset('server/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('server/js/scripts.js') }}"></script>
<script src="{{ asset('server/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('server/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('server/js/jquery.scrollTo.js') }}"></script>

</body>
</html>
