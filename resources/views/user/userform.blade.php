<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="initial-scale=1,user-scalable=no,width=device-width">
<link rel="icon" href="{{asset('img/tab_icon.png')}}" type="image/png">

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->

<link href="{{asset('user/assets/css/bootstrapcdn.css')}}" rel="stylesheet" />
<link href="{{asset('user/assets/dealer.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('user/assets/css/custom.css')}}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('user/assets/js/poper.js')}}"></script>
<script src="{{asset('user/assets/js/bootstrap.js')}}"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
<script src="{{asset('user/assets/js/custom.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>


<style>
    .form-control {
        padding: 25px !important;
    }

    body {
        background: linear-gradient(90deg, rgb(2, 175, 240) 0%, rgb(145, 67, 177) 100%) !important;
    }

    /* section{
        background: linear-gradient( 
                90deg, rgb(2, 175, 240) 0%, rgb(145, 67, 177) 100%) !important;
    } */
    #next {
        background: linear-gradient(90deg, rgb(2, 175, 240) 0%, rgb(145, 67, 177) 100%) !important;
    }
</style>

<div id="svg_wrap"></div>
<div class="text-center">
    <h1>EZZYH PLAN [Application Form]</h1>
    @if($ban)
    <img src="{{asset('/uploads/banners/'.$ban->banner)}}" alt="" style="width:400px;height:150px;">
    @endif
</div>

@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger">
    {{session('error')}}
</div>
@endif



<form action="{{route('storeUserform',['id'=>$id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <section id="myForm">
        <b>Personal information</b>

        <div class="row">
            <div class="col-md-12">
                <input type="hidden" class="form-control mb-2" placeholder="Enter Dealer's Code / Masukkan Kod Dealer *" name="dealer_code" value="{{$id}}" />
                <input type="text" class="form-control mb-2" placeholder="FULL NAME / NAMA PENUH *" name="fullname" maxlength="100" />

                <div class=" mb-2">
                    <label> <b> RACE / BANGSA * </b></label>

                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input" name="race" value="Malay" checked>Malay
                        <label class="form-check-label"> </label>
                    </div>

                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input" name="race" value="Chinese">Chinese
                        <label class="form-check-label"> </label>
                    </div>
                    <div class="form-check m-0">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="race" value="Indian">Indian
                        </label>
                    </div>
                    <div class="form-check m-0">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="race" value="Other">Other
                        </label>
                    </div>
                </div>

                <input type="number" class="form-control mb-2" placeholder="IC NUMBER *" name="ic_number" required />

                <div class="mb-2">
                    <label><b>SEX / JANTINA *</b></label>

                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input" name="gender" value="Male" checked>Male
                        <label class="form-check-label"> </label>
                    </div>
                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input" name="gender" value="Female">Female
                        <label class="form-check-label"> </label>
                    </div>
                </div>

                <div class=" mb-2">
                    <label><b>HOUSING STATUS / STATUS RUMAH *</b></label>

                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input" name="STATUS" value="Rental / Sewa" checked>Rental / Sewa
                        <label class="form-check-label"> </label>
                    </div>
                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input" name="STATUS" value="Own Property / Rumah Sendiri">Own Property / Rumah Sendiri
                        <label class="form-check-label"> </label>
                    </div>
                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input" name="STATUS" value="Family's Property / Rumah Keluarga">Family's Property / Rumah Keluarga
                        <label class="form-check-label"> </label>
                    </div>
                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input" name="STATUS" value="Company's Property / Rumah Syarikat">Company's Property / Rumah Syarikat
                        <label class="form-check-label"> </label>
                    </div>
                </div>
                <div class=" mb-2">
                    <label><b>MARTIAL STATUS / PERKAHWINAN *</b></label>

                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input" name="MARTIAL" value="Single / Bujang" checked>Single / Bujang

                        <label class="form-check-label"> </label>
                    </div>
                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input" name="MARTIAL" value="Married / Berkahwin">Married / Berkahwin
                        <label class="form-check-label"> </label>
                    </div>
                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input" name="MARTIAL" value="Divorced / Bercerai">Divorced / Bercerai
                        <label class="form-check-label"> </label>
                    </div>
                </div>

                <div class="mb-2" id="input">
                    <label><b>BANK NAME / NAMA BANK *</b></label>

                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input hide" name="BANK" value="MAYBANK" checked>MAYBANK
                        <label class="form-check-label"> </label>
                    </div>
                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input hide" name="BANK" value="CIMB">CIMB
                        <label class="form-check-label"> </label>
                    </div>
                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input hide" name="BANK" value="AFFIN BANK">AFFIN BANK
                        <label class="form-check-label"> </label>
                    </div>
                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input hide" name="BANK" value="AFFIN ISLAMIC BANK">AFFIN ISLAMIC BANK
                        <label class="form-check-label"> </label>
                    </div>
                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input hide" name="BANK" value="BANK ISLAM">BANK ISLAM
                        <label class="form-check-label"> </label>
                    </div>
                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input hide" name="BANK" value="BANK KERJASAMA RAKYAT">BANK KERJASAMA RAKYAT
                        <label class="form-check-label"> </label>
                    </div>
                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input hide" name="BANK" value="BANK SIMPANAN NASIONAL">BANK SIMPANAN NASIONAL
                        <label class="form-check-label"> </label>
                    </div>
                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input hide" name="BANK" value="HONG LEONG BANK">HONG LEONG BANK
                        <label class="form-check-label"> </label>
                    </div>
                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input hide" name="BANK" value="PUBLIC BANK">PUBLIC BANK
                        <label class="form-check-label"> </label>
                    </div>
                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input hide" name="BANK" value="RHB BANK">RHB BANK
                        <label class="form-check-label"> </label>
                    </div>
                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input"  name="BANK" id="other" >Other
                        <label class="form-check-label"> </label>
                    </div>
                </div>

                <div class=" mb-2">
                    <label><b>TYPE OF ACCOUNT / JENIS AKAUN *</b></label>

                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input" name="ACCOUNT" value="SAVINGS" checked>SAVINGS
                        <label class="form-check-label"> </label>
                    </div>
                    <div class="form-check m-0">
                        <input type="radio" class="form-check-input" name="ACCOUNT" value="CURRENT">CURRENT
                        <label class="form-check-label"> </label>
                    </div>
                </div>

                <input type="text" class="form-control mb-2 mt-2" placeholder="ACCOUNT NUMBER / NO AKAUN *" name="account_no" maxlength="100" required />
                <input type="text" class="form-control mb-2" placeholder="ACCOUNT HOLDER NAME / PENAMA AKAUN *" name="account_name" maxlength="100" required />
                <input type="text" class="form-control mb-2" placeholder="Email *" name="email" required maxlength="100" />

            </div>
        </div>
    </section>



    <section>
        <b>Address</b>
        <!--<input type="text" class="form-control mb-2" placeholder="FULL NAME / NAMA PENUH *" name="fullname"  />-->
        <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 1 ] *" name="address1" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 2 ] *" name="address2" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="POSTCODE / POSKOD *" name="postcode" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="CITY / BANDAR *" name="city" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="STATE / NEGERI *" name="state" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="HANPHONE NO *" name="hanphone_no" maxlength="100" required />

        <div class=" mb-2">
            <label><b>LENGTH OF STAY / TEMPOH MENETAP *</b></label>

            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="LENGTH" value="Below 1 year" checked>Below 1 year

                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="LENGTH" value="1 - 3 years">1 - 3 years
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="LENGTH" value="4 - 10 years">4 - 10 years
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="LENGTH" value="Above 10 years">Above 10 years
                <label class="form-check-label"> </label>
            </div>
        </div>
        <div class=" mb-2">
            <label><b>BEST TIME TO CALL / WAKTU UNTUK DIHUBUNGI *</b></label>


            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="CALL" value="9 AM - 10 AM">9 AM - 10 AM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="CALL" value="10 AM - 11 AM">10 AM - 11 AM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="CALL" value="11 AM - 12 PM">11 AM - 12 PM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="CALL" value="12 PM - 1 PM">12 PM - 1 PM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="CALL" value="1 PM - 2 PM">1 PM - 2 PM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="CALL" value="2 PM - 3 PM">2 PM - 3 PM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="CALL" value="3 PM - 4 PM">3 PM - 4 PM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="CALL" value="4 PM - 5 PM">4 PM - 5 PM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="CALL" value="ANYTIME">ANYTIME
                <label class="form-check-label"> </label>
            </div>
        </div>



    </section>

    <!-- step 3 -->
    <section>
        <b>EMERGENCY CONTACT 1 (ECP1)</b>
        <br>
        <br>
        <div class=" mb-2">
            <label><b>RELATIONSHIP / HUBUNGAN *</b></label>

            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="RELATIONSHIP" value="Spouse / Pasangan [SUAMI ISTERI SAHAJA] tunang, bf, gf TAK DIBENARKAN!!!" checked>Spouse / Pasangan [SUAMI ISTERI SAHAJA] tunang, bf, gf TAK DIBENARKAN!!!
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="RELATIONSHIP" value="Siblings / Adik-beradik">Siblings / Adik-beradik
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="RELATIONSHIP" value="Parent / Ibu Bapa">Parent / Ibu Bapa
                <label class="form-check-label"> </label>
            </div>
        </div>


        <input type="text" class="form-control mb-2" placeholder="FULL NAME / NAMA PENUH *" name="ecp1_name" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 1 ] *" name="ecp1_add1" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 2 ] *" name="ecp1_add2" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="POSTCODE / POSKOD *" name="ecp1_post" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="CITY / BANDAR *" name="ecp1_city" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="STATE / NEGERI *" name="ecp1_state" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="HANPHONE NO *" name="ecp1_phone" maxlength="100" required />



        <div class=" mb-2">
            <label><b>BEST TIME TO CALL / WAKTU UNTUK DIHUBUNGI *</b></label>

            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp1_call" value="9 AM - 10 AM">9 AM - 10 AM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp1_call" value="10 AM - 11 AM">10 AM - 11 AM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp1_call" value="11 AM - 12 PM">11 AM - 12 PM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp1_call" value="12 PM - 1 PM">12 PM - 1 PM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp1_call" value="1 PM - 2 PM">1 PM - 2 PM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp1_call" value="2 PM - 3 PM">2 PM - 3 PM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp1_call" value="3 PM - 4 PM">3 PM - 4 PM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp1_call" value="4 PM - 5 PM">4 PM - 5 PM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="CALL" value="ANYTIME">ANYTIME
                <label class="form-check-label"> </label>
            </div>
        </div>


    </section>

    <!-- step 4 -->
    <section>
        <b>EMERGENCY CONTACT 2 (ECP2)</b>
        <p>Mesti orang lain. Jangan isi nama sama dengan ECP1</p>
        <div class=" mb-2">
            <label><b>RELATIONSHIP / HUBUNGAN *</b></label>

            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp2_rel" value="Spouse / Pasangan [SUAMI ISTERI SAHAJA] tunang, bf, gf TAK DIBENARKAN!!!" checked>Spouse / Pasangan [SUAMI ISTERI SAHAJA] tunang, bf, gf TAK DIBENARKAN!!!
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp2_rel" value="Siblings / Adik-beradik">Siblings / Adik-beradik
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp2_rel" value="Parent / Ibu Bapa">Parent / Ibu Bapa
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp2_rel" value="Relatives / Saudara">Relatives / Saudara
                <label class="form-check-label"> </label>
            </div>
        </div>

        <input type="text" class="form-control mb-2" placeholder="FULL NAME / NAMA PENUH *" name="ecp2_name" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 1 ] *" name="ecp2_add" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 2 ] *" name="ecp2_add2" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="POSTCODE / POSKOD *" name="ecp2_post" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="CITY / BANDAR *" name="ecp2_city" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="STATE / NEGERI *" name="ecp2_state" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="HANPHONE NO *" name="ecp2_phone" maxlength="100" required />

        <div class=" mb-2">
            <label><b>BEST TIME TO CALL / WAKTU UNTUK DIHUBUNGI *</b></label>


            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp2_call" value="9 AM - 10 AM">9 AM - 10 AM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp2_call" value="10 AM - 11 AM">10 AM - 11 AM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp2_call" value="11 AM - 12 PM">11 AM - 12 PM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp2_call" value="12 PM - 1 PM">12 PM - 1 PM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp2_call" value="1 PM - 2 PM">1 PM - 2 PM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp2_call" value="2 PM - 3 PM">2 PM - 3 PM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp2_call" value="3 PM - 4 PM">3 PM - 4 PM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp2_call" value="4 PM - 5 PM">4 PM - 5 PM
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="ecp2_call" value="ANYTIME">ANYTIME
                <label class="form-check-label"> </label>
            </div>
        </div>

    </section>

    <!-- step 5 -->

    <section>
        <!--<input type="text" class="form-control mb-2" placeholder="TYPE OF OCCUPATION / JENIS PEKERJAAN *" name="occupation_type"  />-->
        <div class=" mb-2">
            <label><b>NATURE OF WORK / BIDANG PEKERJAAN *</b></label>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="NATURE" value="GOVERNMENT / KERAJAAN" checked>GOVERNMENT / KERAJAAN
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="NATURE" value="FINANCE / BANKING">FINANCE / BANKING
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="NATURE" value="LOGISTIC">LOGISTIC
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="NATURE" value="MANUFACTURE / KILANG">MANUFACTURE / KILANG
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="NATURE" value="RETAIL">RETAIL
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="NATURE" value="SERVICES">SERVICES
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="NATURE" value="CONSTRUCTION">CONSTRUCTION
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="NATURE" value="TRANSPORT">TRANSPORT
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="NATURE" value="SELF EMPLOYED / KERJA SENDIRI">SELF EMPLOYED / KERJA SENDIRI
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="NATURE" value="Other">Other
                <label class="form-check-label"> </label>
            </div>
        </div>

        <input type="text" class="form-control mb-2" placeholder="YEARS OF SERVICE / TEMPOH BERKHIDMAT * " name="service_year" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="SALARY DATE / TARIKH GAJI * " name="salary_date" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="SALARY / GAJI *" name="salary" maxlength="100" required />

        <div class=" mb-2">
            <label><b>EMPLOYMENT STATUS / STATUS PEKERJAAN *</b></label>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="EMPLOYMENT" value="CONTRCT / KONTRAK" checked>CONTRCT / KONTRAK
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="EMPLOYMENT" value="PERMANENT / TETAP">PERMANENT / TETAP

                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="EMPLOYMENT" value="SELF EMPLOYED / BEKERJA SENDIRI">SELF EMPLOYED / BEKERJA SENDIRI
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="EMPLOYMENT" value="COMISSION / KOMISYEN">COMISSION / KOMISYEN
                <label class="form-check-label"> </label>
            </div>
        </div>

        <input type="text" class="form-control mb-2" placeholder="COMPANY NAME / NAMA SYARIKAT" name="company_name" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="COMPANY ADDRESS / ALAMAT SYARIKAT [ Line 1 ] *" name="" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="COMPANY ADDRESS / ALAMAT SYARIKAT [ Line 2 ] *" name="company_address" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="POSTCODE / POSKOD *" name="company_postcode" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="CITY / BANDAR *" name="company_city" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="STATE / NEGERI *" name="company_state" maxlength="100" required />
        <input type="text" class="form-control mb-2" placeholder="OFFICE NUMBER / NO TEL SYARIKAT *" name="office_no" maxlength="100" required />

    </section>

    <!-- STEP 6 -->
    <section>
        <div class=" mb-2">
            <label><b>BRAND *</b></label>
            @if(!empty($brands))
            @foreach($brands as $product)
            {{-- @foreach($products as $product) --}}
            <div class="form-check m-0" style="text-transform:uppercase;">
                <input type="radio" class="form-check-input" name="BRAND" value="{{$product->brand}}">{{$product->brand}}
                <label class="form-check-label"> </label>
            </div>
            @endforeach
            @endif
            <!--            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="BRAND" value="SAMSUNG">SAMSUNG
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="BRAND" value="OPPO">OPPO
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="BRAND" value="VIVO">VIVO
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="BRAND" value="HUAWEI">HUAWEI
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="BRAND" value="ONE PLUS">ONE PLUS

                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="BRAND" value="ASUS">ASUS
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="BRAND" value="XIAOMI">XIAOMI
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="BRAND" value="REALME">REALME
                <label class="form-check-label"> </label>
            </div>-->

        </div>

        <div class=" mb-2">
            <label><b>MODEL *</b></label>
            @if(!empty($models))
            @foreach($models as $product)
            <div class="form-check m-0" style="text-transform:uppercase;">
                <input type="radio" class="form-check-input " name="MODEL" value="{{$product->name}}">{{$product->name}}
                <label class="form-check-label"> </label>
            </div>
            @endforeach
            @endif
            <!--            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="IPHONE SE">IPHONE SE

                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="IPHONE 12 MINI">IPHONE 12 MINI
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="IPHONE 12">IPHONE 12
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="IPHONE 12 PRO">IPHONE 12 PRO
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="IPHONE 12 PRO MAX">IPHONE 12 PRO MAX
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG Z FLIP">SAMSUNG Z FLIP
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG Z FOLD 2">SAMSUNG Z FOLD 2
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG NOTE 20 5G">SAMSUNG NOTE 20 5G
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG NOTE 20 ULTRA 5G">SAMSUNG NOTE 20 ULTRA 5G
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG S21 5G">SAMSUNG S21 5G
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG S21 PLUS 5G">SAMSUNG S21 PLUS 5G
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG S21 ULTRA 5G">SAMSUNG S21 ULTRA 5G
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG A72">SAMSUNG A72
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG A52 5GB">SAMSUNG A52 5GB
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG A52">SAMSUNG A52
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG TAB S7">SAMSUNG TAB S7
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG TAB S7 PLUS">SAMSUNG TAB S7 PLUS
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="ONEPLUS 9 5G">ONEPLUS 9 5G
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="ONEPLUS 9 PRO 5G">ONEPLUS 9 PRO 5G
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="ONEPLUS 8T">ONEPLUS 8T
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="ONEPLUS NORD CE 5G">ONEPLUS NORD CE 5G
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="HUAWEI P40 PRO">HUAWEI P40 PRO
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="HUAWEI P40">HUAWEI P40
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="HUAWEI MATE 40 PRO">HUAWEI MATE 40 PRO
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="HUAWEI NOVA 8I">HUAWEI NOVA 8I
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="OPPO FIND X3 PRO">OPPO FIND X3 PRO
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="OPPO RENO 5 PRO 5G">OPPO RENO 5 PRO 5G
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="OPPO RENO 5 5G">OPPO RENO 5 5G
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="OPPO RENO 5F">OPPO RENO 5F
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="OPPO A74 5G">OPPO A74 5G
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="MODEL" value="OPPO A74">OPPO A74
                <label class="form-check-label"> </label>
            </div>-->

        </div>

        <div class=" mb-2">
            <label><b>CAPACITY *</b></label>
            {{-- @if(!empty($products))
            
             @foreach(collect($products)->unique('capacity') as $product) --}}
            @if(!empty($capacities))

            @foreach($capacities as $product)
            {{-- @foreach($products as $product) --}}
            <div class="form-check m-0" style="text-transform:uppercase;">
                <input type="radio" class="form-check-input" name="CAPACITY" value="{{$product->name}}" style="text-transform:uppercase;">{{$product->name}}
                <label class="form-check-label"> </label>
            </div>
            @endforeach
            @endif
            <!--            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="CAPACITY" value="128GB">128GB
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="CAPACITY" value="256GB">256GB
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="CAPACITY" value="512GB">512GB
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="CAPACITY" value="1TB">1TB
                <label class="form-check-label"> </label>
            </div>-->
        </div>

        <div class=" mb-2">
            <label><b>LOAN TENURE *</b></label>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="loan_tenur" value="12">12 MONTHS
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="loan_tenur" value="24">24 MONTHS
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="loan_tenur" value="36">36 MONTHS
                <label class="form-check-label"> </label>
            </div>
        </div>
    </section>

    <section>
        <p>X-Tream Protect Plan merupakan warranty tambahan exclusive untuk phone yang masih ada warranty dengan authorised service centre.</p>
        <img src="{{asset('user/assets/img/docimg.jpg')}}" class="w-100 mb-3 mt-2">
        <label><b>Apa Yang Anda Akan Dapat? </b></label>
        <p><b>Extended Warranty 1 Tahun</b></p>
        <p>-Warranty phone anda akan ditambah lagi 1 tahun menjadi 2 tahun.
            -Anda akan mendapat manfaat perlindungan yg sama seperti 1 tahun yg pertama.</p>

        <p><b>Screen Protect</b></p>
        <p>-Penukaran screen original secara PERCUMA jika screen mengalami sebarang jenis kerosakan.
            - Tidak menggangu warranty asal kerana phone akan dibaiki di authorised centre.</p>

        <p><b>Berapa Harga Plan Ni?</b></p>
        <p>Harga untuk pakej exclusive ni adalah RM299. Tapi dapatkan harga promo limited dengan hanya RM199 sahaja.
        <p>Anda boleh pilih pembayaran melalui Ezzyh Plan atau secara cash. </p>
        <p>Jadual Pembayaran :</p>
        <p>36 month : RM8/month <br>24 month : RM11/month <br>12 month : RM19/month</p>

        <div class=" mb-2">
            <label> <b>Adakah anda berminat untuk apply X-Tream Protect Plan? * </b></label>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="LOAN" value="Ya, saya berminat, pembayaran melaui Ezzyh Plan">Ya, saya berminat, pembayaran melaui Ezzyh Plan
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="LOAN" value="Ya, saya berminat, pembayaran melalui cash">Ya, saya berminat, pembayaran melalui cash
                <label class="form-check-label"> </label>
            </div>
            <div class="form-check m-0">
                <input type="radio" class="form-check-input" name="LOAN" value="Tidak, saya tidak berminat">Tidak, saya tidak berminat
                <label class="form-check-label"> </label>
            </div>
        </div>

    </section>

    <section>
        <!-- <b>Upload Document</b>
    <div id="camera" ></div>

    <input type="button" value="Take a Snap" id="btPic" onclick="takeSnapShot()" /> 
    <p id="snapShot"></p> -->
        <div>
            <label>NRIC Front</label>
            <input type="file" class="form-control" style="padding: 4px !important;" id="img-input"  required  />
            <input type="hidden" class="form-control" name="nric_front" id="imgcmp"  style="padding: 4px !important;" />
        </div>
        <div>
            <label>NRIC Back</label>
            <input type="file" class="form-control"  style="padding: 4px !important;" id="img-input1"  required />
			<input type="hidden" class="form-control" name="nric_back" id="imgcmp1"  style="padding: 4px !important;" />
        </div>
        <div>
            <label>LATEST PAY SLIP (Pdf file recommended)</label>
            <input type="file" class="form-control"  style="padding: 4px !important;" id="img-input2"  required />
			<input type="hidden" class="form-control" name="pay_slip" id="imgcmp2"  style="padding: 4px !important;" />
        </div>
        <div>
            <label>LATEST UTILITIES BIL (Pdf file recommended)</label>
            <input type="file" class="form-control"  style="padding: 4px !important;" id="img-input3"  />
			<input type="hidden" class="form-control" name="pay_bil" id="imgcmp3"  style="padding: 4px !important;" />
        </div>
        <div>
            <label>BANK STATEMENT (Pdf file recommended)</label>
            <input type="file" class="form-control" style="padding: 4px !important;" id="img-input4"  />
			<input type="hidden" class="form-control" name="bank_statement" id="imgcmp4"  style="padding: 4px !important;" />
        </div>
        <div>
            <label>SSM COMPLETE (Pdf file recommended)</label>
            <input type="file" class="form-control"  style="padding: 4px !important;" id="img-input5"  />
			<input type="hidden" class="form-control" name="ssm" id="imgcmp5"  style="padding: 4px !important;" />
        </div>

        <div>
            <label>MESSAGE</label>
            <textarea name="remarks" class="form-control" rows="5" maxlength="300"></textarea>
        </div>


    </section>

    <div class="text-center">
        <div class="button" id="prev">&larr; Previous</div>
        <div class="button" id="next">Next &rarr;</div>
        <button type="submit" class="button" id="submit">Submit</button>
    </div>
</form>



<script>

//add bank input box

$(document).ready(function(){
    $("input[id='other']").change(function(){
        $("#input").append("<input type='text' name='cstm_bank' placeholder='Enter Bank Name' class='form-control additional mt-2'>");
    });
    $(".hide").change(function(){
        $(".additional").hide();
        console.log($(this).val());
    });

});



    const MAX_WIDTH = 380;
    const MAX_HEIGHT = 240;
    const MIME_TYPE = "image/jpeg";
    const QUALITY = 0.7;

    const input = document.getElementById("img-input");
    input.onchange = function(ev) {
        const file = ev.target.files[0]; // get the file
        if(file.type == "application/pdf"){
            input.setAttribute("name","nric_front");
            document.getElementById("imgcmp").removeAttribute("name");
            return;
        }
        const blobURL = URL.createObjectURL(file);
        const img = new Image();
        img.src = blobURL;
        img.onerror = function() {
            URL.revokeObjectURL(this.src);
            // Handle the failure properly
            console.log("Cannot load image");
        };
        img.onload = function() {
            URL.revokeObjectURL(this.src);
            // const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);
            const width = this.width;
            const height = this.height;
            if(height > width){
                const MAX_WIDTH = 480;
            }
            const value = Math.round((MAX_WIDTH/width)*100);
            const newHeight = Math.round((value*height)/100);
            const newWidth = MAX_WIDTH;
            const canvas = document.createElement("canvas");
            canvas.width = newWidth;
            canvas.height = newHeight;
            const ctx = canvas.getContext("2d");
            ctx.drawImage(img, 0, 0, newWidth, newHeight);
            canvas.toBlob(
                (blob) => {
                    //          console.log(blob);
                    // Handle the compressed image. es. upload or save in local state
                    //        displayInfo('Original file', file);
                    //        displayInfo('Compressed file', blob);
                },
                MIME_TYPE,
                QUALITY
            );
            //    console.log(canvas);
            var dataURL = canvas.toDataURL();
            var file1 = new File([dataURL], "name");
            //    console.log(file1);
            document.getElementById("imgcmp").value = dataURL;
            //    document.getElementById("imgcmp").value = file1;
            //    document.getElementById("root").append(canvas);
        };
    };
	
	
	const input1 = document.getElementById("img-input1");
    input1.onchange = function(ev) {
        const file = ev.target.files[0]; // get the file
        if(file.type == "application/pdf"){
            input1.setAttribute("name","nric_back");
            document.getElementById("imgcmp1").removeAttribute("name");
            return;
        }
        const blobURL = URL.createObjectURL(file);
        const img = new Image();
        img.src = blobURL;
        img.onerror = function() {
            URL.revokeObjectURL(this.src);
            // Handle the failure properly
            console.log("Cannot load image");
        };
        img.onload = function() {
            URL.revokeObjectURL(this.src);
            // const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);
            const width = this.width;
	        const height = this.height;
            if(height > width){
                const MAX_WIDTH = 480;
            }
            const value = Math.round((MAX_WIDTH/width)*100);
            const newHeight = Math.round((value*height)/100);
            const newWidth = MAX_WIDTH;
            const canvas = document.createElement("canvas");
            canvas.width = newWidth;
            canvas.height = newHeight;
            const ctx = canvas.getContext("2d");
            ctx.drawImage(img, 0, 0, newWidth, newHeight);
            canvas.toBlob(
                (blob) => {
                    //          console.log(blob);
                    // Handle the compressed image. es. upload or save in local state
                    //        displayInfo('Original file', file);
                    //        displayInfo('Compressed file', blob);
                },
                MIME_TYPE,
                QUALITY
            );
            //    console.log(canvas);
            var dataURL = canvas.toDataURL();
            var file1 = new File([dataURL], "name");
            //    console.log(file1);
				console.log(dataURL);

            document.getElementById("imgcmp1").value = dataURL;
            //    document.getElementById("imgcmp").value = file1;
            //    document.getElementById("root").append(canvas);
        };
    };
	
	const input2 = document.getElementById("img-input2");
    input2.onchange = function(ev) {
        const file = ev.target.files[0]; // get the file
        if(file.type == "application/pdf"){
            input2.setAttribute("name","pay_slip");
            document.getElementById("imgcmp2").removeAttribute("name");
            return;
        }
        const blobURL = URL.createObjectURL(file);
        const img = new Image();
        img.src = blobURL;
        img.onerror = function() {
            URL.revokeObjectURL(this.src);
            // Handle the failure properly
            console.log("Cannot load image");
        };
        img.onload = function() {
            URL.revokeObjectURL(this.src);
            // const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);
            const width = this.width;
	        const height = this.height;
            if(height > width){
                const MAX_WIDTH = 480;
            }
            const value = Math.round((MAX_WIDTH/width)*100);
            const newHeight = Math.round((value*height)/100);
            const newWidth = MAX_WIDTH;

            const canvas = document.createElement("canvas");
            canvas.width = newWidth;
            canvas.height = newHeight;
            const ctx = canvas.getContext("2d");
            ctx.drawImage(img, 0, 0, newWidth, newHeight);
            canvas.toBlob(
                (blob) => {
                    //          console.log(blob);
                    // Handle the compressed image. es. upload or save in local state
                    //        displayInfo('Original file', file);
                    //        displayInfo('Compressed file', blob);
                },
                MIME_TYPE,
                QUALITY
            );
            //    console.log(canvas);
            var dataURL = canvas.toDataURL();
            var file1 = new File([dataURL], "name");
            //    console.log(file1);
            document.getElementById("imgcmp2").value = dataURL;
            //    document.getElementById("imgcmp").value = file1;
            //    document.getElementById("root").append(canvas);
        };
    };
	
	
	const input3 = document.getElementById("img-input3");
    input3.onchange = function(ev) {
        const file = ev.target.files[0]; // get the file
        if(file.type == "application/pdf"){
            input3.setAttribute("name","pay_bil");
            document.getElementById("imgcmp3").removeAttribute("name");
            return;
        }
        const blobURL = URL.createObjectURL(file);
        const img = new Image();
        img.src = blobURL;
        img.onerror = function() {
            URL.revokeObjectURL(this.src);
            // Handle the failure properly
            console.log("Cannot load image");
        };
        img.onload = function() {
            URL.revokeObjectURL(this.src);
            // const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);

            const width = this.width;
	        const height = this.height;
            if(height > width){
                const MAX_WIDTH = 480;
            }
            const value = Math.round((MAX_WIDTH/width)*100);
            const newHeight = Math.round((value*height)/100);
            const newWidth = MAX_WIDTH;

            const canvas = document.createElement("canvas");
            canvas.width = newWidth;
            canvas.height = newHeight;
            const ctx = canvas.getContext("2d");
            ctx.drawImage(img, 0, 0, newWidth, newHeight);
            canvas.toBlob(
                (blob) => {
                    //          console.log(blob);
                    // Handle the compressed image. es. upload or save in local state
                    //        displayInfo('Original file', file);
                    //        displayInfo('Compressed file', blob);
                },
                MIME_TYPE,
                QUALITY
            );
            //    console.log(canvas);
            var dataURL = canvas.toDataURL();
            var file1 = new File([dataURL], "name");
            //    console.log(file1);
            document.getElementById("imgcmp3").value = dataURL;
            //    document.getElementById("imgcmp").value = file1;
            //    document.getElementById("root").append(canvas);
        };
    };
	
	const input4 = document.getElementById("img-input4");
    input4.onchange = function(ev) {
        const file = ev.target.files[0]; // get the file
        if(file.type == "application/pdf"){
            input4.setAttribute("name","bank_statement");
            document.getElementById("imgcmp4").removeAttribute("name");
            return;
        }
        const blobURL = URL.createObjectURL(file);
        const img = new Image();
        img.src = blobURL;
        img.onerror = function() {
            URL.revokeObjectURL(this.src);
            // Handle the failure properly
            console.log("Cannot load image");
        };
        img.onload = function() {
            URL.revokeObjectURL(this.src);
            // const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);
            const width = this.width;
	        const height = this.height;
            if(height > width){
                const MAX_WIDTH = 480;
            }
            const value = Math.round((MAX_WIDTH/width)*100);
            const newHeight = Math.round((value*height)/100);
            const newWidth = MAX_WIDTH;

            const canvas = document.createElement("canvas");
            canvas.width = newWidth;
            canvas.height = newHeight;
            const ctx = canvas.getContext("2d");
            ctx.drawImage(img, 0, 0, newWidth, newHeight);
            canvas.toBlob(
                (blob) => {
                    //          console.log(blob);
                    // Handle the compressed image. es. upload or save in local state
                    //        displayInfo('Original file', file);
                    //        displayInfo('Compressed file', blob);
                },
                MIME_TYPE,
                QUALITY
            );
            //    console.log(canvas);
            var dataURL = canvas.toDataURL();
            var file1 = new File([dataURL], "name");
            //    console.log(file1);
            document.getElementById("imgcmp4").value = dataURL;
            //    document.getElementById("imgcmp").value = file1;
            //    document.getElementById("root").append(canvas);
        };
    };
	
	const input5 = document.getElementById("img-input5");
    input5.onchange = function(ev) {
        const file = ev.target.files[0]; // get the file
        if(file.type == "application/pdf"){
            input5.setAttribute("name","ssm");
            document.getElementById("imgcmp5").removeAttribute("name");
            return;
        }
        const blobURL = URL.createObjectURL(file);
        const img = new Image();
        img.src = blobURL;
        img.onerror = function() {
            URL.revokeObjectURL(this.src);
            // Handle the failure properly
            console.log("Cannot load image");
        };
        img.onload = function() {
            URL.revokeObjectURL(this.src);
            // const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);

            const width = this.width;
            const height = this.height;
            if(height > width){
                const MAX_WIDTH = 480;
            }
            const value = Math.round((MAX_WIDTH/width)*100);
            const newHeight = Math.round((value*height)/100);
            const newWidth = MAX_WIDTH;

            const canvas = document.createElement("canvas");
            canvas.width = newWidth;
            canvas.height = newHeight;
            const ctx = canvas.getContext("2d");
            ctx.drawImage(img, 0, 0, newWidth, newHeight);
            canvas.toBlob(
                (blob) => {
                    //          console.log(blob);
                    // Handle the compressed image. es. upload or save in local state
                    //        displayInfo('Original file', file);
                    //        displayInfo('Compressed file', blob);
                },
                MIME_TYPE,
                QUALITY
            );
            //    console.log(canvas);
            var dataURL = canvas.toDataURL();
            var file1 = new File([dataURL], "name");
            //    console.log(file1);
            document.getElementById("imgcmp5").value = dataURL;
            //    document.getElementById("imgcmp").value = file1;
            //    document.getElementById("root").append(canvas);
        };
    };
	

	
	

    function calculateSize(img, maxWidth, maxHeight) {
        let width = img.width;
        let height = img.height;

        // calculate the width and height, constraining the proportions
        if (width > height) {
            if (width > maxWidth) {
                height = Math.round((height * maxWidth) / width);
                width = maxWidth;
            }
        } else {
            if (height > maxHeight) {
                width = Math.round((width * maxHeight) / height);
                height = maxHeight;
            }
        }
        return [width, height];
    }

    // Utility functions for demo purpose

    function displayInfo(label, file) {
        //    console.log(file.name);
        const p = document.createElement('p');
        p.innerText = `${label} - ${readableBytes(file.size)}`;
        document.getElementById('root').append(p);
    }

    function readableBytes(bytes) {
        const i = Math.floor(Math.log(bytes) / Math.log(1024)),
            sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

        return (bytes / Math.pow(1024, i)).toFixed(2) + ' ' + sizes[i];
    }
</script>



<script>
    var fileReader = new FileReader();
    var filterType = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;

    fileReader.onload = function(event) {
        var image = new Image();

        image.onload = function() {
            document.getElementById("img-input").src = image.src;
            var canvas = document.createElement("canvas");
            var context = canvas.getContext("2d");
            canvas.width = image.width / 4;
            canvas.height = image.height / 4;
            context.drawImage(image,
                0,
                0,
                image.width,
                image.height,
                0,
                0,
                canvas.width,
                canvas.height
            );

            document.getElementById("upload").src = canvas.toDataURL();
        }
        image.src = event.target.result;
        image.value = event.target.result;
    };

    var loadImageFile = function() {
        var uploadImage = document.getElementById("upload-Image");

        //check and retuns the length of uploded file.
        if (uploadImage.files.length === 0) {
            return;
        }

        //Is Used for validate a valid file.
        var uploadFile = document.getElementById("upload-Image").files[0];
        if (!filterType.test(uploadFile.type)) {
            alert("Please select a valid image.");
            return;
        }

        fileReader.readAsDataURL(uploadFile);
    }

</script>