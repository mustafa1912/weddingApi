<!DOCTYPE html>
<html >

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="{{asset('dist/img/school.jpg')}}" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    {{-- custom theme --}}
    <link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">
</head>

<body class="hold-transition login-page" style="color:blue">
<div class="login-box">


    <!-- /.start login-logo photo -->
    <div class="login-logo " style="color: #21BA45">
        <div class="row">
            <img src="{{asset('dist/img/school.jpg')}}" style="height: 300px;width: 300px" class="img-circle elevation-2" alt="Mahmoud Image">
        </div>
        <span class="brand-text-login font-weight-bold">نظام اداره المدارس</span>
    </div>

    <!-- /.end login-logo photo -->
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg fontrag"> <span class="fas fa-lock ml-2"></span>تسجيل الدخول </p>
{{--            @include('admin.layouts.alerts.success')--}}
{{--            @include('admin.layouts.alerts.error')--}}
            <form action="{{route('admin.login.store')}}" method="post">
                @csrf

                <div class="input-group mb-3">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="اسم المستخدم" name="email" required>
                </div>
                <div class="input-group mb-3">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <input type="password" class="form-control" placeholder="كلمة المرور" name="password" required>
                </div>

                <div class=" col-md-2" hidden>
                    <div class="custom-control custom-switch">
                        <input type="radio" class="custom-control-input" id="customSwitch4" name="type" checked value="1">
                        <label class="custom-control-label" for="customSwitch4"> دكتور</label>
                    </div>
                </div>
                <div class="row ">
                    <!-- /.col -->
                    <div class="col-4 mt-5 ">
                        <button type="submit" class="btn btn-success btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                    <div class="col-8 mt-5">
                        <div class="icheck-primary fontrag  ">

                            <label for="remember">
                                تذكر كلمة السر
                            </label>
                            <input type="checkbox" id="remember" name="checkbox">
                        </div>
                    </div>

                </div>
            </form>

            {{-- <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="#">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="register.html" class="text-center">Register a new membership</a>
            </p> --}}
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
