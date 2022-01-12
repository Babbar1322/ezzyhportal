<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ezzyh Portal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('img/tab_icon.png')}}" type="image/png">

    <link href="{{asset('user/assets/css/bootstrapcdn.css')}}" rel="stylesheet" />
    <link href="{{asset('user/assets/dealer.css')}}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
    <script src="{{asset('user/assets/js/poper.js')}}"></script>
    <script src="{{asset('user/assets/js/bootstrap.js')}}"></script>
</head>

<body>

    <div class="container register regpanel" style="background: -webkit-linear-gradient(left, #f49062, #465392) !important">
        <div class="row m-0">
            <div class="col-md-3 register-left d-none d-md-block">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome</h3>
                <p>To EZZYH PORTAL</p>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Apply as a Subseller</h3>
                       
                        @if(Session('error'))
                        <div class="alert alert-danger">
                            {{Session('error')}}
                        </div>
                        @endif
                        @if(Session('success'))
                        <div class="alert alert-info">
                            {{Session('success')}}
                        </div>
                        @endif

                        <form action="{{route('registerSubseller', ['id'=> $id ])}}" method="post">
                            @csrf
                            <input type="hidden" name="roles" value="subseller" />
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Name *" value="" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="company" placeholder="Company name: *" value="" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="address" placeholder="Address: *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="bank_name" placeholder="Bank name:" value="" />
                                    </div>

                                </div>
                                <div class="col-md-6 text-center">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Your Email *" value="" required />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" minlength="10" maxlength="12" name="contact" class="form-control" placeholder="Phone number: *" value="" required />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="bank_acc_no" placeholder="Bank account number:" value="" />
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <input type="submit" class="btnRegister sb_btn px-5 py-1 " value="Register" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br>

    <style>
        .register-login {
            background: #f8f9fa;
            border-top-right-radius: 10% 50%;
            border-bottom-right-radius: 10% 50%;
        }

        .rbtn {
            color: white;
            border-right: 1px solid white;
            width: 100%;
        }

        .rbtn2 {
            /* background: purple; */
            color: white;
            /* border-radius: 5px;
        border: 1px solid white; */
            width: 100%;
        }


        @media (max-width: 767px) {

            .register-login {
                background: #f8f9fa;
                border-top-right-radius: 0% !important;
                border-bottom-right-radius: 0% !important;
            }

            .logpanel {
                margin-top: 20%;
            }

            .register-heading {
                text-align: center;
                margin-top: 8%;
                margin-bottom: 0px !important;
                color: #495057;
            }

            .form-group {
                margin-bottom: 10%;
            }

            .register-right {
                background: #f8f9fa;
                border-top-left-radius: 0px !important;
                border-bottom-left-radius: 0px !important;
            }

            .footdiv {
                position: fixed;
                bottom: 0px;
                width: 100%;
            }

            a:hover {
                color: #ffffff;
                text-decoration: none;
            }

            .btnactive {
                border: 1px solid grey;
                border-radius: 5px;
            }
        }
    </style>

    <!-----------  Login ---------->
    <!-- <div class="container register logpanel d-none" style="background:-webkit-linear-gradient(left, #f462d6, #7f3a4a) !important;">
        <div class="row m-0">

            <div class="col-md-9 register-login">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Login Seller</h3>
                        <form class="signUp" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row register-form">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Your Email *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password *" value="" />
                                    </div>
                                    <div class="text-center">
                                        <input type="submit" class="btnRegister sb_btn px-5 py-1 " value="Login" />
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3 register-left d-none d-md-block">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome</h3>
                <p>To EZZYH PORTAL</p>
                <a href="#" class="logbtn px-4" type="submit" name="" /> Register </a><br />
            </div>
        </div>
    </div> -->

    <!-- only for mobile -->
    <!-- <div class="row mt-3  d-md-none d-lg-none">
        <div class="col-md-12 ">
            <div class="bg-dark d-flex footdiv p-2">
                <div class="col-md-6 text-center">
                    <a href="#" class="logbtn rbtn" type="submit" name="" /> Register </a>
                </div>
                <div class="col-md-6 text-center">
                    <a href="#" class="regbtn rbtn2" type="submit" name="" /> Login </a>
                </div>
            </div>
        </div>
    </div> -->

    <script>
        $(document).ready(function() {
            // show register on click 
            $(".logbtn").click(function() {
                $(".regbtn").removeClass("btnactive");
                $(this).addClass("btnactive");

                $(".logpanel").fadeOut("slow");
                $(".regpanel").fadeIn("slow");
            });

            // show login block on click
            $(".regbtn").click(function() {
                $(".logbtn").removeClass("btnactive");
                $(this).addClass("btnactive");

                $(".logpanel").removeClass("d-none");

                $(".logpanel").fadeIn("slow");
                $(".regpanel").fadeOut("slow");
            });

        })
    </script>
</body>

</html>