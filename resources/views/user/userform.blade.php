<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="initial-scale=1,user-scalable=no,width=device-width">
   
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('user/assets/css/custom.css')}}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{asset('user/assets/js/custom.js')}}"></script>
<style>
    .form-control {
        padding: 25px !important;
    }
</style>

<div id="svg_wrap"></div>
<div class="text-center">
    <h1>EZZYH PLAN [Application Form]</h1>
</div>
<form  action="#" method="post" >
<section id="myForm">
    <b>Personal information</b>
    <div class="row">
        <div class="col-md-12">
            <input type="text" class="form-control mb-2" placeholder="Enter Dealer's Code / Masukkan Kod Dealer *" required />
            <input type="text" class="form-control mb-2" placeholder="FULL NAME / NAMA PENUH *" required />

            <div class=" mb-2">
                <label> <b> RACE / BANGSA * </b></label>

                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="race" checked required>Malay
                    <label class="form-check-label"> </label>
                </div>

                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="race" required>Chinese
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="race" required>Indian
                    </label>
                </div>
                <div class="form-check m-0">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="race" required>Other
                    </label>
                </div>
            </div>

            <input type="text" class="form-control mb-2" placeholder="IC NUMBER *" required />

            <div class="mb-2">
                <label><b>SEX / JANTINA *</b></label>

                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="gender" checked required>Male
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="gender" required>Female
                    <label class="form-check-label"> </label>
                </div>
            </div>

            <div class=" mb-2">
                <label><b>HOUSING STATUS / STATUS RUMAH *</b></label>

                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="STATUS" checked required>Rental / Sewa
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="STATUS" required>Own Property / Rumah Sendiri
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="STATUS" required>Family's Property / Rumah Keluarga
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="STATUS" required>Company's Property / Rumah Syarikat
                    <label class="form-check-label"> </label>
                </div>
            </div>
            <div class=" mb-2">
                <label><b>MARTIAL STATUS / PERKAHWINAN *</b></label>

                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="MARTIAL" checked required>Single / Bujang

                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="MARTIAL" required>Married / Berkahwin
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="MARTIAL" required>Divorced / Bercerai
                    <label class="form-check-label"> </label>
                </div>
            </div>

            <div class="mb-2">
                <label><b>BANK NAME / NAMA BANK *</b></label>

                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" checked required>MAYBANK
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" required>CIMB
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" required>AFFIN BANK
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" required>AFFIN ISLAMIC BANK
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" required>BANK ISLAM
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" required>BANK KERJASAMA RAKYAT
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" required>BANK SIMPANAN NASIONAL
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" required>HONG LEONG BANK
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" required>PUBLIC BANK
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" required>RHB BANK
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" required>Other
                    <label class="form-check-label"> </label>
                </div>
            </div>

            <div class=" mb-2">
                <label><b>TYPE OF ACCOUNT / JENIS AKAUN *</b></label>

                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="ACCOUNT" checked required>SAVINGS
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="ACCOUNT" required>CURRENT
                    <label class="form-check-label"> </label>
                </div>
            </div>

            <input type="text" class="form-control mb-2 mt-2" placeholder="ACCOUNT NUMBER / NO AKAUN *" required />
            <input type="text" class="form-control mb-2" placeholder="ACCOUNT HOLDER NAME / PENAMA AKAUN *" required />

        </div>
    </div>
</section>

<section >
    <b>Address</b>
    <input type="text" class="form-control mb-2" placeholder="EMAIL *" required />
    <input type="text" class="form-control mb-2" placeholder="HANPHONE NO *" required />
    <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 1 ] *" required />
    <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 2 ] *" required />
    <input type="text" class="form-control mb-2" placeholder="POSTCODE / POSKOD *" required />
    <input type="text" class="form-control mb-2" placeholder="CITY / BANDAR * " required />
    <input type="text" class="form-control mb-2" placeholder="STATE / NEGERI * " required />

    <div class=" mb-2">
        <label><b>LENGTH OF STAY / TEMPOH MENETAP *</b></label>

        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LENGTH" checked required>Below 1 year

            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LENGTH" required>1 - 3 years
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LENGTH" required>4 - 10 years
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LENGTH" required>Above 10 years
            <label class="form-check-label"> </label>
        </div>
    </div>
    <div class=" mb-2">
        <label><b>BEST TIME TO CALL / WAKTU UNTUK DIHUBUNGI *</b></label>

       
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" required>9 AM - 10 AM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" required>10 AM - 11 AM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" required>11 AM - 12 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" required>12 PM - 1 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" required>1 PM - 2 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" required>2 PM - 3 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" required>3 PM - 4 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" required>4 PM - 5 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" required>ANYTIME
            <label class="form-check-label"> </label>
        </div>
    </div>



</section>

<!-- step 3 -->
<section>
    <b >EMERGENCY CONTACT 1 (ECP1)</b>
    <br>
    <br>
    <div class=" mb-2">
        <label><b>RELATIONSHIP / HUBUNGAN *</b></label>

        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="RELATIONSHIP" checked>Spouse / Pasangan [SUAMI ISTERI SAHAJA] tunang, bf, gf TAK DIBENARKAN!!!
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="RELATIONSHIP">Siblings / Adik-beradik
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="RELATIONSHIP">Parent / Ibu Bapa
            <label class="form-check-label"> </label>
        </div>
    </div>

    <input type="text" class="form-control mb-2" placeholder="FULL NAME / NAMA PENUH *" required />
    <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 1 ] *" required />
    <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 2 ] *" required />
    <input type="text" class="form-control mb-2" placeholder="POSTCODE / POSKOD *" required />
    <input type="text" class="form-control mb-2" placeholder="CITY / BANDAR *" required />
    <input type="text" class="form-control mb-2" placeholder="STATE / NEGERI *" required />
    <input type="text" class="form-control mb-2" placeholder="HANPHONE NO *" required />

    <div class=" mb-2">
        <label><b>BEST TIME TO CALL / WAKTU UNTUK DIHUBUNGI *</b></label>

        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL">9 AM - 10 AM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL">10 AM - 11 AM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL">11 AM - 12 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL">12 PM - 1 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL">1 PM - 2 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL">2 PM - 3 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL">3 PM - 4 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL">4 PM - 5 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL">ANYTIME
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
            <input type="radio" class="form-check-input" name="RELATIONSHIP" checked>Spouse / Pasangan [SUAMI ISTERI SAHAJA] tunang, bf, gf TAK DIBENARKAN!!!
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="RELATIONSHIP">Siblings / Adik-beradik
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="RELATIONSHIP">Parent / Ibu Bapa
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="RELATIONSHIP">Relatives / Saudara
            <label class="form-check-label"> </label>
        </div>
    </div>

    <input type="text" class="form-control mb-2" placeholder="FULL NAME / NAMA PENUH *" required />
    <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 1 ] *" required />
    <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 2 ] *" required />
    <input type="text" class="form-control mb-2" placeholder="POSTCODE / POSKOD *" required />
    <input type="text" class="form-control mb-2" placeholder="CITY / BANDAR *" required />
    <input type="text" class="form-control mb-2" placeholder="STATE / NEGERI *" required />
    <input type="text" class="form-control mb-2" placeholder="HANPHONE NO *" required />

    <div class=" mb-2">
        <label><b>BEST TIME TO CALL / WAKTU UNTUK DIHUBUNGI *</b></label>

       
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL">9 AM - 10 AM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL">10 AM - 11 AM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL">11 AM - 12 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL">12 PM - 1 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL">1 PM - 2 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL">2 PM - 3 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL">3 PM - 4 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL">4 PM - 5 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL">ANYTIME
            <label class="form-check-label"> </label>
        </div>
    </div>

</section>

<!-- step 5 -->

<section>
    <input type="text" class="form-control mb-2" placeholder="TYPE OF OCCUPATION / JENIS PEKERJAAN *" required />
    <div class=" mb-2">
        <label><b>NATURE OF WORK / BIDANG PEKERJAAN *</b></label>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE" checked>GOVERNMENT / KERAJAAN
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE">FINANCE / BANKING
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE">LOGISTIC
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE">MANUFACTURE / KILANG
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE">RETAIL
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE">SERVICES
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE">CONSTRUCTION
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE">TRANSPORT
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE">SELF EMPLOYED / KERJA SENDIRI
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE">Other
            <label class="form-check-label"> </label>
        </div>
    </div>

    <input type="text" class="form-control mb-2" placeholder="YEARS OF SERVICE / TEMPOH BERKHIDMAT * " required />
    <input type="text" class="form-control mb-2" placeholder="SALARY DATE / TARIKH GAJI * " required />
    <input type="text" class="form-control mb-2" placeholder="SALARY / GAJI *" required />

    <div class=" mb-2">
        <label><b>EMPLOYMENT STATUS / STATUS PEKERJAAN *</b></label>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="EMPLOYMENT" checked>CONTRCT / KONTRAK
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="EMPLOYMENT">PERMANENT / TETAP

            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="EMPLOYMENT">SELF EMPLOYED / BEKERJA SENDIRI
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="EMPLOYMENT">COMISSION / KOMISYEN
            <label class="form-check-label"> </label>
        </div>
    </div>

    <input type="text" class="form-control mb-2" placeholder="COMPANY NAME / NAMA SYARIKAT" required />
    <input type="text" class="form-control mb-2" placeholder="COMPANY ADDRESS / ALAMAT SYARIKAT [ Line 1 ] *" required />
    <input type="text" class="form-control mb-2" placeholder="COMPANY ADDRESS / ALAMAT SYARIKAT [ Line 2 ] *" required />
    <input type="text" class="form-control mb-2" placeholder="POSTCODE / POSKOD *" required />
    <input type="text" class="form-control mb-2" placeholder="CITY / BANDAR *" required />
    <input type="text" class="form-control mb-2" placeholder="STATE / NEGERI *" required />
    <input type="text" class="form-control mb-2" placeholder="OFFICE NUMBER / NO TEL SYARIKAT *" required />

</section>

<!-- STEP 6 -->
<section>
    <div class=" mb-2">
        <label><b>BRAND *</b></label>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="BRAND" checked>APPLE
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="BRAND">SAMSUNG
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="BRAND">OPPO
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="BRAND">VIVO
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="BRAND">HUAWEI
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="BRAND">ONE PLUS

            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="BRAND">ASUS
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="BRAND">XIAOMI
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="BRAND">REALME
            <label class="form-check-label"> </label>
        </div>

    </div>

    <div class=" mb-2">
        <label><b>MODEL *</b></label>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" checked>IPHONE 11
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">IPHONE SE

            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">IPHONE 12 MINI
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">IPHONE 12
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">IPHONE 12 PRO
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">IPHONE 12 PRO MAX
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">SAMSUNG Z FLIP
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">SAMSUNG Z FOLD 2
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">SAMSUNG NOTE 20 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">SAMSUNG NOTE 20 ULTRA 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">SAMSUNG S21 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">SAMSUNG S21 PLUS 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">SAMSUNG S21 ULTRA 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">SAMSUNG A72
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">SAMSUNG A52 5GB
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">SAMSUNG A52
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">SAMSUNG TAB S7
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">SAMSUNG TAB S7 PLUS
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">ONEPLUS 9 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">ONEPLUS 9 PRO 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">ONEPLUS 8T
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">ONEPLUS NORD CE 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">HUAWEI P40 PRO
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">HUAWEI P40
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">HUAWEI MATE 40 PRO
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">HUAWEI NOVA 8I
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">OPPO FIND X3 PRO
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">OPPO RENO 5 PRO 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">OPPO RENO 5 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">OPPO RENO 5F
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">OPPO A74 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL">OPPO A74
            <label class="form-check-label"> </label>
        </div>

    </div>

    <div class=" mb-2">
        <label><b>CAPACITY *</b></label>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CAPACITY">64GB
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CAPACITY">128GB
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CAPACITY">256GB
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CAPACITY">512GB
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CAPACITY">1TB
            <label class="form-check-label"> </label>
        </div>
    </div>

    <div class=" mb-2">
        <label><b>LOAN TENURE *</b></label>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LOAN">12 MONTHS
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LOAN">24 MONTHS
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LOAN">36 MONTHS
            <label class="form-check-label"> </label>
        </div>
    </div>
</section>

<section>
<p>X-Tream Protect Plan merupakan warranty tambahan exclusive untuk phone yang masih ada warranty dengan authorised service centre.</p>
    <img src="{{asset('user/assets/img/docimg.jpg')}}" class="w-100 mb-3 mt-2" >
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
            <input type="radio" class="form-check-input" name="LOAN">Ya, saya berminat, pembayaran melaui Ezzyh Plan
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LOAN">Ya, saya berminat, pembayaran melalui cash
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LOAN">Tidak, saya tidak berminat
            <label class="form-check-label"> </label>
        </div>
    </div>

</section>

</form>


<div class="text-center">
    <div class="button" id="prev">&larr; Previous</div>
    <div class="button" id="next">Next &rarr;</div>
    <div class="button" id="submit">Submit</div>
</div>