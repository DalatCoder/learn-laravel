<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập quản trị viên</title>
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
</head>
<body>
<div class="log-w3">
    <div class="w3layouts-main">
        <h2>Đăng nhập Quản Trị Viên</h2>

        <?php
        $message = \Illuminate\Support\Facades\Session::get('message');
        if (!empty($message)) {
            echo '<div class="alert alert-danger">' . $message . '</div>';
            \Illuminate\Support\Facades\Session::put('message', null);
        }
        ?>

        <form action="{{ route('admin.login') }}" method="post">
            @csrf
            <input type="email" class="ggg" name="admin_email" placeholder="Email" required=""
                   value="{{ old('admin_email') }}">
            <input type="password" class="ggg" name="admin_password" placeholder="Mật khẩu" required=""
                   value="{{ old('admin_password') }}">

            <span><input type="checkbox"/>Duy trì đăng nhập</span>
            <h6><a href="#">Quên mật khẩu</a></h6>
            <div class="clearfix"></div>
            <input type="submit" value="Đăng nhập" name="login">
        </form>
    </div>
</div>
<script src="{{ asset('server/js/bootstrap.js') }}"></script>
<script src="{{ asset('server/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('server/js/scripts.js') }}"></script>
<script src="{{ asset('server/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('server/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('server/js/jquery.scrollTo.js') }}"></script>
</body>
</html>
