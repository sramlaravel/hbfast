

@extends('layouts.master')

@section('content')
    <style>
        .FAQsPage .featured {
            padding-top: 50px;
            background-color: #2e4066;
            color: #FFF;
        }

        .heading h1 {
            text-align: center;
            font-size: 50px;
            padding: 45px 0;


        }



        /*.faqs {*/
            /*padding-bottom: 150px;*/
        /*}*/
        /*.faqs .heading_1{*/
            /*padding-bottom: 50px;*/
        /*}*/
        .card{
            margin-top: 2px;
        }
        .btn-link.collapsed{
            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('js/hb/fag.css') }}" />
    <section class="FAQsPage">

        <section class="faqs">
            <div class="heading text-center site-width featured">
                <h2 class="heading_1" style="    color: #FFF;">الاسئلة الشائعة</h2>
            </div>
            <div class="site-width">
                <div id="accordion">

                    <div class="card">
                        <div class="card-header" id="heading1">
                            <h5 class="mb-0">
                                <button class=" btn-link " data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1"  style="font-size: 23px; font-weight: bold ; font-size: larger;">
                                    متى أوقات الدوام ؟
                                </button>
                            </h5>
                        </div>

                        <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion">
                            <div class="card-body">
                                <p>&nbsp;</p>

                                <p><strong>من السبت إلى الخميس</strong></p>

                                <p>من الساعه 9 صباحا وحتى &ndash; الساعه 9 مساءا</p>

                                <p><br />
                                    <strong>الجمعه</strong><br />
                                    من الساعه 4 عصرا وحتى الساعه 8 مساءا .</p>

                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="heading2">
                            <h5 class="mb-0">
                                <button class=" btn-link collapsed" data-toggle="collapse" data-target="#collapse2"  aria-expanded="false" aria-controls="collapse2" style="  font-weight: bold ; font-size: larger;">
                                    ماهي متطلبات فتح الحساب التجاري ؟
                                </button>
                            </h5>
                        </div>

                        <div id="collapse2" class="collapse " aria-labelledby="heading2" data-parent="#accordion">
                            <div class="card-body">
                                <p style="direction: rtl;">&nbsp;</p><p style="direction: rtl;"><strong>للشركات يتطلب فتح الحساب لدينا :</strong></p><p style="direction: rtl;">سجل تجاري وصورة البطاقة الشخصية أو جواز السفر ( ساري المفعول ) لمالك الشركة .</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="heading text-center site-width featured">

                <p class="para_1" style="    color: #FFF;">هل يوجد لديك اي سؤال او استفسار عن خدماتنا ؟ لا تتردد في اخبارنا و نعدك سنبذل قصارى جهدنا لمساعدتك

                </p>

                <br>
                <a href="{{URL::to('/contact')}} " class="btn btn-secondary">تواصل ينا</a>
            </div>
        </section>
    </section>

@stop
