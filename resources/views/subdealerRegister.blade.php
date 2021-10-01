<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="initial-scale=1,user-scalable=no,width=device-width">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="{{asset('user/assets/dealer.css')}}" rel="stylesheet" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container register regpanel" style=" background: -webkit-linear-gradient(left, #af31a1, #3f8295);">
    <div class="row">
        <div class="col-md-3 register-left d-none d-md-block">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>Welcome</h3>
            <p>To EZZYH PORTAL</p>
            <!-- <a href="#" class="regbtn" type="submit" name="" /> Login </a><br />
            <a href="{{route('index')}}" type="submit" name="" /> Home </a> <br /> -->
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Apply as a Sub Dealer</h3>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(Session('success'))
                        <div class="alert alert-info">
                            {{Session('success')}}
                        </div>
                        @endif

                    <form action="{{route('subdealRegister', ['id'=>$id])}}" method="post">
                        @csrf
                        <input type="hidden" name="roles" value="subdealer" />
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Name *" value=""  required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="address" placeholder="Address: *" value=""  />
                                </div>
                                <!-- <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password *" value=""  required/>
                                </div> -->

                            </div>
                            <div class="col-md-6 text-center">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email *" value="" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" minlength="10" maxlength="10" name="contact" class="form-control" placeholder="Emergency  contact: *" value="" required />
                                </div>
                                <!-- <div class="form-group">
                                    <input type="password" class="form-control" name="confirm-password" placeholder="Confirm Password *" value="" required />
                                </div> -->

                                <!-- <input type="submit" class="btnRegister" value="Register" /> -->
                            </div>
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btnRegister px-5 py-1 " value="Register" />
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
        /* background: #0062cc; */
        color: white;
        /* border-radius: 5px; */
        border-right: 1px solid white;
        width: 100%;
    }

    .rbtn2 {
        /* background: #0062cc; */
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
<!-- <div class="container register logpanel d-none" style=" background: -webkit-linear-gradient(left, #af31a1, #3f8295);">
    <div class="row m-0">

    <div class="col-md-9 register-login">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Login Subdealer</h3>
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