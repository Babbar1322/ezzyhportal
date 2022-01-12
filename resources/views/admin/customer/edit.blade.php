@extends('layouts.admin_app')
@section('content')

<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30 pt-4">
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <h4>Edit Customer</h4>
                                <div class="box_right d-flex lms_block">
                                    <a class="btn btn-primary" href="{{ route('customer.index') }}"> Back</a>
                                </div>
                            </div>

                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif


                            {!! Form::model($user, ['method' => 'PATCH','route' => ['customer.update', $user->id] ,'enctype'=>'multipart/form-data']) !!}
                            <b>Personal information</b>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control mb-2" placeholder="Enter Dealer's Code / Masukkan Kod Dealer *" name="dealer_code" value="{{$user->dealer_code}}" />
                                    <input type="text" class="form-control mb-2" placeholder="FULL NAME / NAMA PENUH *" name="fullname"  value="{{$user->fullname}}"  />
                    
                                    <div class=" mb-2">
                                        <label> <b> RACE / BANGSA * </b></label>
                    
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="race" value="Malay" {{$user->race == 'Malay'?'checked':''}} >Malay
                                            <label class="form-check-label"> </label>
                                        </div>
                    
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="race" value="Chinese" {{$user->race == 'Chinese'?'checked':''}} >Chinese
                                            <label class="form-check-label"> </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="race" value="Indian" {{$user->race == 'Indian'?'checked':''}} >Indian
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="race" value="Other" {{$user->race == 'Other'?'checked':''}} >Other
                                            </label>
                                        </div>
                                    </div>
                    
                                    <input type="text" class="form-control mb-2" placeholder="IC NUMBER *" name="ic_number" value="{{$user->ic_number}}"  />
                    
                                    <div class="mb-2">
                                        <label><b>SEX / JANTINA *</b></label>
                    
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="gender" value="Male" {{$user->gender == 'Male'? 'checked':''}} >Male
                                            <label class="form-check-label"> </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="gender" value="Female" {{$user->gender == 'Female'? 'checked':''}} >Female
                                            <label class="form-check-label"> </label>
                                        </div>
                                    </div>
                    
                                    <div class=" mb-2">
                                        <label><b>HOUSING STATUS / STATUS RUMAH *</b></label>
                    
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="STATUS" value="Rental / Sewa" {{$user->status == 'Rental / Sewa'?'checked':''}} >Rental / Sewa
                                            <label class="form-check-label"> </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="STATUS" value="Own Property / Rumah Sendiri" {{$user->status == 'Own Property / Rumah Sendiri'?'checked':''}} >Own Property / Rumah Sendiri
                                            <label class="form-check-label"> </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="STATUS" value="Family's Property / Rumah Keluarga" {{$user->status == "Family's Property / Rumah Keluarga"?'checked':''}} >Family's Property / Rumah Keluarga
                                            <label class="form-check-label"> </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="STATUS" value="Company's Property / Rumah Syarikat" {{$user->status == "Company's Property / Rumah Syarikat"?'checked':''}} >Company's Property / Rumah Syarikat
                                            <label class="form-check-label"> </label>
                                        </div>
                                    </div>
                                    <div class=" mb-2">
                                        <label><b>MAR TIAL STATUS / PERKAHWINAN *</b></label>
                    
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="MARTIAL" value="Single / Bujang" {{$user->martial == 'Single / Bujang' ? 'checked' : ''}}  >Single / Bujang
                    
                                            <label class="form-check-label"> </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="MARTIAL" value="Married / Berkahwin" {{$user->martial == 'Married / Berkahwin' ? 'checked' : ''}} >Married / Berkahwin
                                            <label class="form-check-label"> </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="MARTIAL" value="Divorced / Bercerai" {{$user->martial == 'Divorced / Bercerai' ? 'checked' : ''}} >Divorced / Bercerai
                                            <label class="form-check-label"> </label>
                                        </div>
                                    </div>
                    
                                    <div class="mb-2">
                                        <label><b>BANK NAME / NAMA BANK *</b></label>
                    
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="BANK" value="MAYBANK" {{$user->bank == 'MAYBANK' ? 'checked' : ''}} >MAYBANK
                                            <label class="form-check-label"> </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="BANK" value="CIMB" {{$user->bank == 'CIMB' ? 'checked' : ''}} >CIMB
                                            <label class="form-check-label"> </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="BANK" value="AFFIN BANK" {{$user->bank == 'AFFIN BANK' ? 'checked' : ''}} >AFFIN BANK
                                            <label class="form-check-label"> </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="BANK" value="AFFIN ISLAMIC BANK" {{$user->bank == 'AFFIN ISLAMIC BANK' ? 'checked' : ''}} >AFFIN ISLAMIC BANK
                                            <label class="form-check-label"> </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="BANK" value="BANK ISLAM" {{$user->bank == 'BANK ISLAM' ? 'checked' : ''}} >BANK ISLAM
                                            <label class="form-check-label"> </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="BANK" value="BANK KERJASAMA RAKYAT" {{$user->bank == 'BANK KERJASAMA RAKYAT' ? 'checked' : ''}} >BANK KERJASAMA RAKYAT
                                            <label class="form-check-label"> </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="BANK" value="BANK SIMPANAN NASIONAL" {{$user->bank == 'BANK SIMPANAN NASIONAL' ? 'checked' : ''}} >BANK SIMPANAN NASIONAL
                                            <label class="form-check-label"> </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="BANK" value="HONG LEONG BANK" {{$user->bank == 'HONG LEONG BANK' ? 'checked' : ''}} >HONG LEONG BANK
                                            <label class="form-check-label"> </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="BANK" value="PUBLIC BANK" {{$user->bank == 'PUBLIC BANK' ? 'checked' : ''}} >PUBLIC BANK
                                            <label class="form-check-label"> </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="BANK" value="RHB BANK" {{$user->bank == 'RHB BANK' ? 'checked' : ''}} >RHB BANK
                                            <label class="form-check-label"> </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="BANK" value="Other" {{$user->bank == 'Other' ? 'checked' : ''}} >Other
                                            <label class="form-check-label"> </label>
                                        </div>
                                    </div>
                    
                                    <div class="mb-2">
                                        <label><b>TYPE OF ACCOUNT / JENIS AKAUN *</b></label>
                    
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="ACCOUNT" value="SAVINGS"  {{$user->account == 'SAVINGS' ? 'checked' : ''}} >SAVINGS
                                            <label class="form-check-label"> </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="radio" class="form-check-input" name="ACCOUNT" value="CURRENT" {{$user->account == 'CURRENT' ? 'checked' : ''}} >CURRENT
                                            <label class="form-check-label"> </label>
                                        </div>
                                    </div>
                    
                                    <input type="text" class="form-control mb-2 mt-2" placeholder="ACCOUNT NUMBER/NO AKAUN*" name="account_no" value="{{$user->account_no}}"  />
                                    <input type="text" class="form-control mb-2" placeholder="ACCOUNT HOLDER NAME / PENAMA AKAUN *" name="account_name" value="{{$user->account_name}}"  />
                                    <input type="text" class="form-control mb-2" placeholder="Email *" name="email" value="{{$user->email}}"  />
                    
                                </div>
                            </div>
                      
                            <b>Address</b>
                            <!--<input type="text" class="form-control mb-2" placeholder="FULL NAME / NAMA PENUH *" name="fullname"  />-->
                            <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 1 ] *" name="address1" value="{{$user->address1}}"  />
                            <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 2 ] *" name="address2" value="{{$user->address2}}"  />
                            <input type="text" class="form-control mb-2" placeholder="POSTCODE / POSKOD *" name="postcode" value="{{$user->postcode}}"  />
                            <input type="text" class="form-control mb-2" placeholder="CITY / BANDAR *" name="city" value="{{$user->city}}"  />
                            <input type="text" class="form-control mb-2" placeholder="STATE / NEGERI *" name="state" value="{{$user->state}}"  />
                            <input type="text" class="form-control mb-2" placeholder="HANPHONE NO *" name="hanphone_no" value="{{$user->hanphone_no}}"  />
                    
                            <div class=" mb-2">
                                <label><b>LENGTH OF STAY / TEMPOH MENETAP *</b></label>
                    
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="LENGTH" value="Below 1 year" {{$user->length == "Below 1 year" ? "checked":""}} >Below 1 year
                    
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="LENGTH" value="1 - 3 years" {{$user->length == "1 - 3 years" ? "checked":""}} >1 - 3 years
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="LENGTH" value="4 - 10 years" {{$user->length == "4 - 10 years" ? "checked":""}} >4 - 10 years
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="LENGTH" value="Above 10 years" {{$user->length == "Above 10 years" ? "checked":""}} >Above 10 years
                                    <label class="form-check-label"> </label>
                                </div>
                            </div>
                            <div class=" mb-2">
                                <label><b>BEST TIME TO CALL / WAKTU UNTUK DIHUBUNGI *</b></label>
                    
                    
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="CALL" value="9 AM - 10 AM" {{$user->call1 == "9 AM - 10 AM" ? "checked":""}} >9 AM - 10 AM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="CALL" value="10 AM - 11 AM" {{$user->call1 == "10 AM - 11 AM" ? "checked":""}} >10 AM - 11 AM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="CALL" value="11 AM - 12 PM" {{$user->call1 == "11 AM - 12 PM" ? "checked":""}} >11 AM - 12 PM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="CALL" value="12 PM - 1 PM" {{$user->call1 == "12 PM - 1 PM" ? "checked":""}} >12 PM - 1 PM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="CALL" value="1 PM - 2 PM" {{$user->call1 == "1 PM - 2 PM" ? "checked":""}} >1 PM - 2 PM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="CALL" value="2 PM - 3 PM" {{$user->call1 == "2 PM - 3 PM" ? "checked":""}} >2 PM - 3 PM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="CALL" value="3 PM - 4 PM" {{$user->call1 == "3 PM - 4 PM" ? "checked":""}} >3 PM - 4 PM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="CALL" value="4 PM - 5 PM" {{$user->call1 == "4 PM - 5 PM" ? "checked":""}} >4 PM - 5 PM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="CALL" value="ANYTIME" {{$user->call1 == "ANYTIME" ? "checked":""}} >ANYTIME
                                    <label class="form-check-label"> </label>
                                </div>
                            </div>
                    
                    
                    
                      
                            <b>EMERGENCY CONTACT 1 (ECP1)</b>
                            <br>
                            <br>
                            <div class=" mb-2">
                                <label><b>RELATIONSHIP / HUBUNGAN *</b></label>
                    
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="RELATIONSHIP" value="Spouse / Pasangan [SUAMI ISTERI SAHAJA] tunang, bf, gf TAK DIBENARKAN!!!" {{$user->relationship == "Spouse / Pasangan [SUAMI ISTERI SAHAJA] tunang, bf, gf TAK DIBENARKAN!!!" ? "checked":""}}>Spouse / Pasangan [SUAMI ISTERI SAHAJA] tunang, bf, gf TAK DIBENARKAN!!!
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="RELATIONSHIP" value="Siblings / Adik-beradik" {{$user->relationship == "Siblings / Adik-beradik" ? "checked":""}}>Siblings / Adik-beradik
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="RELATIONSHIP" value="Parent / Ibu Bapa" {{$user->relationship == "Parent / Ibu Bapa" ? "checked":""}}>Parent / Ibu Bapa
                                    <label class="form-check-label"> </label>
                                </div>
                            </div>
                    
                    
                            <input type="text" class="form-control mb-2" placeholder="FULL NAME / NAMA PENUH *" name="ecp1_name" value="{{$user->ecp1_name}}"  />
                            <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 1 ] *" name="ecp1_add1" value="{{$user->ecp1_add1}}"  />
                            <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 2 ] *" name="ecp1_add2" value="{{$user->ecp1_add2}}"  />
                            <input type="text" class="form-control mb-2" placeholder="POSTCODE / POSKOD *" name="ecp1_post" value="{{$user->ecp1_post}}"  />
                            <input type="text" class="form-control mb-2" placeholder="CITY / BANDAR *" name="ecp1_city" value="{{$user->ecp1_city}}"  />
                            <input type="text" class="form-control mb-2" placeholder="STATE / NEGERI *" name="ecp1_state" value="{{$user->ecp1_state}}"  />
                            <input type="text" class="form-control mb-2" placeholder="HANPHONE NO *" name="ecp1_phone" value="{{$user->ecp1_phone}}"  />
                    
                    
                    
                            <div class=" mb-2">
                                <label><b>BEST TIME TO CALL / WAKTU UNTUK DIHUBUNGI *</b></label>
                    
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp1_call" value="9 AM - 10 AM" {{$user->ecp1_call == "9 AM - 10 AM" ? "checked":""}}>9 AM - 10 AM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp1_call" value="10 AM - 11 AM" {{$user->ecp1_call == "10 AM - 11 AM" ? "checked":""}}>10 AM - 11 AM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp1_call" value="11 AM - 12 PM" {{$user->ecp1_call == "11 AM - 12 PM" ? "checked":""}}>11 AM - 12 PM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp1_call" value="12 PM - 1 PM" {{$user->ecp1_call == "12 PM - 1 PM" ? "checked":""}} >12 PM - 1 PM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp1_call" value="1 PM - 2 PM" {{$user->ecp1_call == "1 PM - 2 PM" ? "checked":""}}>1 PM - 2 PM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp1_call" value="2 PM - 3 PM" {{$user->ecp1_call == "2 PM - 3 PM" ? "checked":""}}>2 PM - 3 PM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp1_call" value="3 PM - 4 PM" {{$user->ecp1_call == "3 PM - 4 PM" ? "checked":""}}>3 PM - 4 PM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp1_call" value="4 PM - 5 PM" {{$user->ecp1_call == "4 PM - 5 PM" ? "checked":""}}>4 PM - 5 PM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="CALL" value="ANYTIME" {{$user->ecp1_call == "ANYTIME" ? "checked":""}}>ANYTIME
                                    <label class="form-check-label"> </label>
                                </div>
                            </div>
                    
                    
                            <b>EMERGENCY CONTACT 2 (ECP2)</b>
                            <p>Mesti orang lain. Jangan isi nama sama dengan ECP1</p>
                            <div class=" mb-2">
                                <label><b>RELATIONSHIP / HUBUNGAN *</b></label>
                    
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp2_rel" value="Spouse / Pasangan [SUAMI ISTERI SAHAJA] tunang, bf, gf TAK DIBENARKAN!!!" {{$user->ecp2_rel == "Spouse / Pasangan [SUAMI ISTERI SAHAJA] tunang, bf, gf TAK DIBENARKAN!!!" ? "checked":""}}>Spouse / Pasangan [SUAMI ISTERI SAHAJA] tunang, bf, gf TAK DIBENARKAN!!!
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp2_rel" value="Siblings / Adik-beradik" {{$user->ecp2_rel == "Siblings / Adik-beradik" ? "checked":""}}>Siblings / Adik-beradik
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp2_rel" value="Parent / Ibu Bapa" {{$user->ecp2_rel == "Parent / Ibu Bapa" ? "checked":""}}>Parent / Ibu Bapa
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp2_rel" value="Relatives / Saudara" {{$user->ecp2_rel == "Relatives / Saudara" ? "checked":""}}>Relatives / Saudara
                                    <label class="form-check-label"> </label>
                                </div>
                            </div>
                    
                            <input type="text" class="form-control mb-2" placeholder="FULL NAME / NAMA PENUH *" name="ecp2_name" value="{{$user->ecp_name}}"  />
                            <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 1 ] *" name="ecp2_add" value="{{$user->ecp2_add}}"  />
                            <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 2 ] *" name="ecp2_add2" value="{{$user->ecp2_add2}}"  />
                            <input type="text" class="form-control mb-2" placeholder="POSTCODE / POSKOD *" name="ecp2_post" value="{{$user->ecp2_post}}"  />
                            <input type="text" class="form-control mb-2" placeholder="CITY / BANDAR *" name="ecp2_city" value="{{$user->ecp2_city}}"  />
                            <input type="text" class="form-control mb-2" placeholder="STATE / NEGERI *" name="ecp2_state" value="{{$user->ecp2_state}}"  />
                            <input type="text" class="form-control mb-2" placeholder="HANPHONE NO *" name="ecp2_phone" value="{{$user->ecp2_phone}}"  />
                    
                            <div class=" mb-2">
                                <label><b>BEST TIME TO CALL / WAKTU UNTUK DIHUBUNGI *</b></label>
                    
                    
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp2_call" value="9 AM - 10 AM" {{$user->ecp2_call == "9 AM - 10 AM"?"checked":""}}>9 AM - 10 AM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp2_call" value="10 AM - 11 AM" {{$user->ecp2_call == "10 AM - 11 AM"?"checked":""}}>10 AM - 11 AM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp2_call" value="11 AM - 12 PM" {{$user->ecp2_call == "11 AM - 12 PM"?"checked":""}}>11 AM - 12 PM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp2_call" value="12 PM - 1 PM" {{$user->ecp2_call == "12 PM - 1 PM"?"checked":""}}>12 PM - 1 PM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp2_call" value="1 PM - 2 PM" {{$user->ecp2_call == "1 PM - 2 PM"?"checked":""}}>1 PM - 2 PM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp2_call" value="2 PM - 3 PM" {{$user->ecp2_call == "2 PM - 3 PM"?"checked":""}}>2 PM - 3 PM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp2_call" value="3 PM - 4 PM" {{$user->ecp2_call == "3 PM - 4 PM"?"checked":""}}>3 PM - 4 PM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp2_call" value="4 PM - 5 PM" {{$user->ecp2_call == "4 PM - 5 PM"?"checked":""}}>4 PM - 5 PM
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="ecp2_call" value="ANYTIME" {{$user->ecp2_call == "ANYTIME"?"checked":""}}>ANYTIME
                                    <label class="form-check-label"> </label>
                                </div>
                            </div>
                    
                     
                            <!--<input type="text" class="form-control mb-2" placeholder="TYPE OF OCCUPATION / JENIS PEKERJAAN *" name="occupation_type"  />-->
                            <div class=" mb-2">
                                <label><b>NATURE OF WORK / BIDANG PEKERJAAN *</b></label>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="NATURE" value="GOVERNMENT / KERAJAAN" {{$user->nature == "GOVERNMENT / KERAJAAN" ? "checked" :"" }}>GOVERNMENT / KERAJAAN
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="NATURE" value="FINANCE / BANKING" {{$user->nature == "FINANCE / BANKING" ? "checked" :"" }}>FINANCE / BANKING
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="NATURE" value="LOGISTIC" {{$user->nature == "LOGISTIC" ? "checked" :"" }}>LOGISTIC
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="NATURE" value="MANUFACTURE / KILANG" {{$user->nature == "MANUFACTURE / KILANG" ? "checked" :"" }}>MANUFACTURE / KILANG
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="NATURE" value="RETAIL" {{$user->nature == "RETAIL" ? "checked" :"" }}>RETAIL
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="NATURE" value="SERVICES" {{$user->nature == "SERVICES" ? "checked" :"" }}>SERVICES
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="NATURE" value="CONSTRUCTION" {{$user->nature == "CONSTRUCTION" ? "checked" :"" }}>CONSTRUCTION
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="NATURE" value="TRANSPORT" {{$user->nature == "TRANSPORT" ? "checked" :"" }}>TRANSPORT
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="NATURE" value="SELF EMPLOYED / KERJA SENDIRI" {{$user->nature == "SELF EMPLOYED / KERJA SENDIRI" ? "checked" :"" }}>SELF EMPLOYED / KERJA SENDIRI
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="NATURE" value="Other" {{$user->nature == "Other" ? "checked" :"" }}>Other
                                    <label class="form-check-label"> </label>
                                </div>
                            </div>
                    
                            <input type="text" class="form-control mb-2" placeholder="YEARS OF SERVICE / TEMPOH BERKHIDMAT * " name="service_year" value="{{$user->service_year}}"  />
                            <input type="text" class="form-control mb-2" placeholder="SALARY DATE / TARIKH GAJI * " name="salary_date" value="{{$user->salary_date}}"  />
                            <input type="text" class="form-control mb-2" placeholder="SALARY / GAJI *" name="salary" value="{{$user->salary}}"  />
                    
                            <div class=" mb-2">
                                <label><b>EMPLOYMENT STATUS / STATUS PEKERJAAN *</b></label>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="EMPLOYMENT" value="CONTRCT / KONTRAK" {{$user->employment == "CONTRCT / KONTRAK" ? "checked":""}}>CONTRCT / KONTRAK
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="EMPLOYMENT" value="PERMANENT / TETAP" {{$user->employment == "PERMANENT / TETAP" ? "checked":""}}>PERMANENT / TETAP
                    
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="EMPLOYMENT" value="SELF EMPLOYED / BEKERJA SENDIRI" {{$user->employment == "SELF EMPLOYED / BEKERJA SENDIRI" ? "checked":""}}>SELF EMPLOYED / BEKERJA SENDIRI
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="EMPLOYMENT" value="COMISSION / KOMISYEN" {{$user->employment == "COMISSION / KOMISYEN" ? "checked":""}}>COMISSION / KOMISYEN
                                    <label class="form-check-label"> </label>
                                </div>
                            </div>
                    
                            <input type="text" class="form-control mb-2" placeholder="COMPANY NAME / NAMA SYARIKAT" name="company_name" value="{{$user->company_name}}"  />
                            <input type="text" class="form-control mb-2" placeholder="COMPANY ADDRESS / ALAMAT SYARIKAT [ Line 1 ] *" name=""  />
                            <input type="text" class="form-control mb-2" placeholder="COMPANY ADDRESS / ALAMAT SYARIKAT [ Line 2 ] *" name="company_address" value="{{$user->company_address}}"  />
                            <input type="text" class="form-control mb-2" placeholder="POSTCODE / POSKOD *" name="company_postcode" value="{{$user->company_postcode}}"  />
                            <input type="text" class="form-control mb-2" placeholder="CITY / BANDAR *" name="company_city" value="{{$user->company_city}}"  />
                            <input type="text" class="form-control mb-2" placeholder="STATE / NEGERI *" name="company_state" value="{{$user->company_state}}"  />
                            <input type="text" class="form-control mb-2" placeholder="OFFICE NUMBER / NO TEL SYARIKAT *" name="office_no" value="{{$user->office_no}}"  />
                    
                     
                            <div class=" mb-2">
                                <label><b>BRAND *</b></label>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="BRAND" value="APPLE" {{$user->brand == "APPLE"?"checked":""}}>APPLE
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="BRAND" value="SAMSUNG" {{$user->brand == "SAMSUNG"?"checked":""}}>SAMSUNG
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="BRAND" value="OPPO" {{$user->brand == "OPPO"?"checked":""}}>OPPO
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="BRAND" value="VIVO" {{$user->brand == "VIVO"?"checked":""}}>VIVO
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="BRAND" value="HUAWEI" {{$user->brand == "HUAWEI"?"checked":""}}>HUAWEI
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="BRAND" value="ONE PLUS" {{$user->brand == "ONE PLUS"?"checked":""}}>ONE PLUS
                    
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="BRAND" value="ASUS" {{$user->brand == "ASUS"?"checked":""}}>ASUS
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="BRAND" value="XIAOMI" {{$user->brand == "XIAOMI"?"checked":""}}>XIAOMI
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="BRAND" value="REALME" {{$user->brand == "REALME"?"checked":""}}>REALME
                                    <label class="form-check-label"> </label>
                                </div>
                    
                            </div>
                    
                            <div class=" mb-2">
                                <label><b>MODEL *</b></label>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="IPHONE 11" {{$user->model == "IPHONE 11"?"checked":""}}>IPHONE 11
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="IPHONE SE" {{$user->model == "IPHONE SE"?"checked":""}}>IPHONE SE
                    
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="IPHONE 12 MINI" {{$user->model == "IPHONE 12 MINI"?"checked":""}}>IPHONE 12 MINI
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="IPHONE 12" {{$user->model == "IPHONE 12"?"checked":""}}>IPHONE 12
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="IPHONE 12 PRO" {{$user->model == "IPHONE 12 PRO"?"checked":""}}>IPHONE 12 PRO
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="IPHONE 12 PRO MAX" {{$user->model == "IPHONE 12 PRO MAX"?"checked":""}}>IPHONE 12 PRO MAX
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG Z FLIP" {{$user->model == "SAMSUNG Z FLIP"?"checked":""}}>SAMSUNG Z FLIP
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG Z FOLD 2" {{$user->model == "SAMSUNG Z FOLD 2"?"checked":""}}>SAMSUNG Z FOLD 2
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG NOTE 20 5G" {{$user->model == "SAMSUNG NOTE 20 5G"?"checked":""}}>SAMSUNG NOTE 20 5G
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG NOTE 20 ULTRA 5G" {{$user->model == "SAMSUNG NOTE 20 ULTRA 5G"?"checked":""}}>SAMSUNG NOTE 20 ULTRA 5G
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG S21 5G" {{$user->model == "SAMSUNG S21 5G"?"checked":""}}>SAMSUNG S21 5G
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG S21 PLUS 5G" {{$user->model == "SAMSUNG S21 PLUS 5G"?"checked":""}}>SAMSUNG S21 PLUS 5G
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG S21 ULTRA 5G" {{$user->model == "SAMSUNG S21 ULTRA 5G"?"checked":""}}>SAMSUNG S21 ULTRA 5G
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG A72" {{$user->model == "SAMSUNG A72"?"checked":""}}>SAMSUNG A72
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG A52 5GB" {{$user->model == "SAMSUNG A52 5GB"?"checked":""}}>SAMSUNG A52 5GB
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG A52" {{$user->model == "SAMSUNG A52"?"checked":""}}>SAMSUNG A52
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG TAB S7" {{$user->model == "SAMSUNG TAB S7"?"checked":""}}>SAMSUNG TAB S7
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG TAB S7 PLUS" {{$user->model == "SAMSUNG TAB S7 PLUS"?"checked":""}}>SAMSUNG TAB S7 PLUS
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="ONEPLUS 9 5G" {{$user->model == "ONEPLUS 9 5G"?"checked":""}}>ONEPLUS 9 5G
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="ONEPLUS 9 PRO 5G" {{$user->model == "ONEPLUS 9 PRO 5G"?"checked":""}}>ONEPLUS 9 PRO 5G
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="ONEPLUS 8T" {{$user->model == "ONEPLUS 8T"?"checked":""}}>ONEPLUS 8T
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="ONEPLUS NORD CE 5G" {{$user->model == "ONEPLUS NORD CE 5G"?"checked":""}}>ONEPLUS NORD CE 5G
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="HUAWEI P40 PRO" {{$user->model == "HUAWEI P40 PRO"?"checked":""}}>HUAWEI P40 PRO
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="HUAWEI P40" {{$user->model == "HUAWEI P40"?"checked":""}}>HUAWEI P40
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="HUAWEI MATE 40 PRO" {{$user->model == "HUAWEI MATE 40 PRO"?"checked":""}}>HUAWEI MATE 40 PRO
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="HUAWEI NOVA 8I" {{$user->model == "HUAWEI NOVA 8I"?"checked":""}}>HUAWEI NOVA 8I
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="OPPO FIND X3 PRO" {{$user->model == "OPPO FIND X3 PRO"?"checked":""}}>OPPO FIND X3 PRO
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="OPPO RENO 5 PRO 5G" {{$user->model == "OPPO RENO 5 PRO 5G"?"checked":""}}>OPPO RENO 5 PRO 5G
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="OPPO RENO 5 5G" {{$user->model == "OPPO RENO 5 5G"?"checked":""}}>OPPO RENO 5 5G
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="OPPO RENO 5F" {{$user->model == "OPPO RENO 5F"?"checked":""}}>OPPO RENO 5F
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="OPPO A74 5G" {{$user->model == "OPPO A74 5G"?"checked":""}}>OPPO A74 5G
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="MODEL" value="OPPO A74" {{$user->model == "OPPO A74"?"checked":""}}>OPPO A74
                                    <label class="form-check-label"> </label>
                                </div>
                    
                            </div>
                    
                            <div class=" mb-2">
                                <label><b>CAPACITY *</b></label>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="CAPACITY" value="64GB" {{$user->capacity == "64GB" ? "checked":""}}>64GB
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="CAPACITY" value="128GB" {{$user->capacity == "128GB" ? "checked":""}}>128GB
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="CAPACITY" value="256GB" {{$user->capacity == "256GB" ? "checked":""}}>256GB
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="CAPACITY" value="512GB" {{$user->capacity == "512GB" ? "checked":""}}>512GB
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="CAPACITY" value="1TB" {{$user->capacity == "1TB" ? "checked":""}}>1TB
                                    <label class="form-check-label"> </label>
                                </div>
                            </div>
                    
                            <div class=" mb-2">
                                <label><b>LOAN TENURE *</b></label>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="loan_tenur" value="12" {{$user->loan_tenur == "12" ? "checked":""}}>12 MONTHS
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="loan_tenur" value="24" {{$user->loan_tenur == "24" ? "checked":""}}>24 MONTHS
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="loan_tenur" value="36" {{$user->loan_tenur == "36" ? "checked":""}}>36 MONTHS
                                    <label class="form-check-label"> </label>
                                </div>
                            </div>
                        
                            <p>X-Tream Protect Plan merupakan warranty tambahan exclusive untuk phone yang masih ada warranty dengan authorised service centre.</p>
                            {{-- <img src="{{asset('user/assets/img/docimg.jpg')}}" class="w-100 mb-3 mt-2"> --}}
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
                                    <input type="radio" class="form-check-input" name="LOAN" value="Ya, saya berminat, pembayaran melaui Ezzyh Plan" {{$user->loan == "Ya, saya berminat, pembayaran melaui Ezzyh Plan"?"checked":""}}>Ya, saya berminat, pembayaran melaui Ezzyh Plan
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="LOAN" value="Ya, saya berminat, pembayaran melalui cash" {{$user->loan == "Ya, saya berminat, pembayaran melalui cash"?"checked":""}}>Ya, saya berminat, pembayaran melalui cash
                                    <label class="form-check-label"> </label>
                                </div>
                                <div class="form-check m-0">
                                    <input type="radio" class="form-check-input" name="LOAN" value="Tidak, saya tidak berminat" {{$user->loan == "Tidak, saya tidak berminat"?"checked":""}}>Tidak, saya tidak berminat
                                    <label class="form-check-label"> </label>
                                </div>
                            </div>
                            <div>
                                <label>NRIC Front</label>
                                <input type="file" class="form-control" name="nric_front" style="padding: 4px !important;" />
                                @if ($user->nric_front != null)
                                    <img src="{{asset('uploads/front/'.$user->nric_front)}}" alt="" width="100">
                                @endif
                            </div>
                            <div>
                                <label>NRIC Back</label>
                                <input type="file" class="form-control" name="nric_back" style="padding: 4px !important;" />
                                @if ($user->nric_back != null)
                                <img src="{{asset('uploads/back/'.$user->nric_back)}}" alt="" width="100">
                                @endif
                            </div>
                            <div>
                                <label>LATEST PAY SLIP</label>
                                <input type="file" class="form-control" name="pay_slip" style="padding: 4px !important;" />
                                    @if ($user->pay_slip != null)
                                        <img src="{{asset('uploads/slip/'.$user->pay_slip)}}" alt="" width="100">
                                    @endif
                            </div>
                            <div>
                                <label>LATEST UTILITIES BIL</label>
                                <input type="file" class="form-control" name="pay_bil" style="padding: 4px !important;" />
                                    @if ($user->pay_bil != null)
                                        <img src="{{asset('uploads/bill/'.$user->pay_bil)}}" alt="" width="100">
                                    @endif
                            </div>
                            <div>
                                <label>BANK STATEMENT</label>
                                <input type="file" class="form-control" name="bank_statement" style="padding: 4px !important;" />
                                @if ($user->bank_statement != null)
                                    <img src="{{asset('uploads/bank/'.$user->bank_statement)}}" alt="" width="100">
                                @endif
                            </div>
                            <div>
                                <label>SSM COMPLETE</label>
                                <input type="file" class="form-control" name="ssm" style="padding: 4px !important;" />
                                @if ($user->ssm != null)
                                    <img src="{{asset('uploads/ssm/'.$user->ssm)}}" alt="" width="100">
                                @endif
                            </div>
                            <div>
                                <label>MESSAGE</label>
                                <textarea name="remarks"  class="form-control" rows="5">{{$user->remarks}}</textarea>
                         </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-success" id="submit">Submit</button>
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection