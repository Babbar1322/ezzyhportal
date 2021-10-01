<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ezzyh Plan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="icon" type="image/png" href="{{asset('user/login/images/icons/favicon.ico')}}  " /> -->
    <link rel="stylesheet" type="text/css" href="{{asset('user/login/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/login/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/login/vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/login/vendor/css-hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/login/vendor/animsition/css/animsition.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/login/vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/login/vendor/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/login/css/main.css')}}">
</head>

<body>

    <div class="limiter">
        <!-- <div class="container-login100" style="background-image:url('{{ asset('user/login/images/bg-01.jpg')}}');"> -->
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{route('login') }}">
                @csrf
                    <span class="login100-form-logo">
                        <!-- <i class="zmdi zmdi-landscape"></i> -->
                        <img src="{{asset('img/logo.png')}}" class="w-100 p-3" alt="">
                    </span>

                    <!-- <span class="login100-form-title p-b-34 p-t-27">
                        Log in
                    </span> -->

                    <div class="mt-5 wrap-input100 validate-input" data-validate="Enter username">
                        <input id="email" type="text" placeholder="Email" class="input100 " name="username" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <!-- <input class="input100" type="text" name="username" placeholder="Username"> -->
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        @error("email")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input id="password" type="password" placeholder="Password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <!-- <input class="input100" type="password" name="pass" placeholder="Password"> -->
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    @if (Route::has('password.request'))
                    <div class="text-center p-t-90">
                        <a class="txt1" href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>
    <script src="{{asset('user/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('user/login/vendor/animsition/js/animsition.min.js')}}"></script>
    <script src="{{asset('user/login/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('user/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('user/login/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('user/login/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('user/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('user/login/vendor/countdowntime/countdowntime.js')}}"></script>
    <script src="{{asset('user/login/js/main.js')}}"></script>

</body>

</html>