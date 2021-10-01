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
            <div class="wrap-login100" style="background: #02bc98;">
                <form method="POST" action="{{ route('password.update') }}" class="login100-form validate-form">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <span class="login100-form-logo">
                        <img src="{{asset('img/logo.png')}}" class="w-100 p-3" alt="">
                    </span>

                    <div class="mt-5 wrap-input100 validate-input" data-validate="Enter Email">
                        <input id="email" type="email" placeholder="Email Address" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>
                    @error('email')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror

                    <div class="mt-5 wrap-input100 validate-input" data-validate="Enter Password">
                    <input id="password" placeholder="Enter Password" type="password" class="input100  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                    @error('password')
                            <span  role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror


                    <div class="mt-5 wrap-input100 validate-input" data-validate="Enter Password">
                    <input id="password-confirm" placeholder="Confirm Password" type="password" class="input100 " name="password_confirmation" required autocomplete="new-password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                        Reset Password
                        </button>
                    </div>

                    <!-- <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Reset Password
                            </button>
                        </div>
                    </div> -->
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