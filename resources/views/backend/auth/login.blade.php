<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login -CodeTree</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('/')}}public/admin/assets/images/icon.png">
    <link rel="stylesheet" href="{{asset('/')}}public/admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}public/admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/')}}public/admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('/')}}public/admin/assets/css/metisMenu.css">
    <link rel="stylesheet" href="{{asset('/')}}public/admin/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('/')}}public/admin/assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('/')}}public/admin/assets/css/typography.css">
    <link rel="stylesheet" href="{{asset('/')}}public/admin/assets/css/default-css.css">
    <link rel="stylesheet" href="{{asset('/')}}public/admin/assets/css/styles.css">
    <link rel="stylesheet" href="{{asset('/')}}public/admin/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="{{asset('/')}}public/admin/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    <div class="login-form-head">
                        <h4><img src="{{asset('/')}}public/admin/assets/images/logo.png"></h4>
                                            </div>
                    <div class="login-form-body">
                       
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="text" id="exampleInputEmail1" name="email">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="exampleInputPassword1" name="password">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <!--<a href="#">Forgot Password?</a>-->
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="{{asset('/')}}public/admin/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="{{asset('/')}}public/admin/assets/js/popper.min.js"></script>
    <script src="{{asset('/')}}public/admin/assets/js/bootstrap.min.js"></script>
    <script src="{{asset('/')}}public/admin/assets/js/owl.carousel.min.js"></script>
    <script src="{{asset('/')}}public/admin/assets/js/metisMenu.min.js"></script>
    <script src="{{asset('/')}}public/admin/assets/js/jquery.slimscroll.min.js"></script>
    <script src="{{asset('/')}}public/admin/assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="{{asset('/')}}public/admin/assets/js/plugins.js"></script>
    <script src="{{asset('/')}}public/admin/assets/js/scripts.js"></script>
</body>

</html>