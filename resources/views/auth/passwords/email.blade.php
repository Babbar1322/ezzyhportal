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
            <div class="wrap-login100" style="background: #1d83bc !important;">

                <form method="POST" action="{{ route('password.email') }}" class="login100-form validate-form">
                    @csrf

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <span class="login100-form-logo">
                        <!-- <i class="zmdi zmdi-landscape"></i> -->
                        <img src="{{asset('img/logo.png')}}" class="w-100 p-3" alt="">
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        Forget Password
                    </span>

                    <div class="mt-5 wrap-input100 validate-input" data-validate="Enter Email">
                        <input id="email" type="email" placeholder="Email Address" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>
                    @error('email')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                        Send Password Reset Link
                        </button>
                    </div>

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