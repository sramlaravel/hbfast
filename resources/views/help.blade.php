
@extends('layouts.master')

@section('content')
    <link href="public/theme/standard/slick.min.css" rel="stylesheet" type="text/css"/>


    <style>
        .helpCenterPage {
            background: #faf9f8;
            padding-bottom: 100px;
        }

        .helpCenterPage .mega-header {
            background: url('theme/standard/images/helpcenter.jpg');
            overflow: hidden;
            background-position: center;
            background-size: cover;
        }

        .helpCenterPage .mega-header {
            padding: 160px 20px;

        }

        .helpCenterPage .mega-header .search-form {
            max-width: 450px;
            margin: 0;
        }

        .helpCenterPage .mega-header .heading_1 {
            max-width: 100%;
        }

        .helpCenterPage .mega-header .heading_1 img {
            max-width: 220px;
            vertical-align: middle;
            display: inline-block;
            border-left: 1px solid #fff;
            padding: 0 12px;
            box-sizing: border-box;
        }

        .helpCenterPage .mega-header .heading_1 span {
            display: inline-block;
            vertical-align: middle;
            color: #fff;
        }

        .helpCenterOptions {
            padding: 30px 0 80px;
        }

        .helpCenterOptions .col-md-4 {

            padding: 30px 79px 0;
            box-sizing: border-box;
            -webkit-transition: all 0.4s;
            -moz-transition: all 0.4s;
            -ms-transition: all 0.4s;
            -o-transition: all 0.4s;
            transition: all 0.4s;
            border-radius: 4px;
        }

        .helpCenterOptions .col-md-4:hover {
            background: #fff;
        }

        .helpCenterOptions .col-md-4 li a {
            padding: 8px 0;
        }

        .helpCenterOptions .col-md-4 h4 {
            color: #6f1917;
            background-repeat: no-repeat;
            background-size: 35px;
            background-position: right center;
            padding: 20px 0;
            padding-right: 47px;
            font-size: 18px;
            text-transform: uppercase;
            margin: 0;
            margin-right: -47px;
        }

        .helpCenterOptions .col-md-4:first-child h4 {
            background-image: url("theme/standard/images/write-to-us-icon.png");
        }

        .helpCenterOptions .col-md-4:nth-child(2) h4 {
            background-image: url("theme/standard/images/open-ticket-icon.png");
        }

        .helpCenterOptions .col-md-4:last-child h4 {
            background-image: url("theme/standard/images/live-chat-icon.png");
        }

        .helpCenterOptions .col-md-4 li span,
        .helpCenterOptions .col-md-4 li small {
            display: block;
            font-size: 15px;
        }

        .helpCenterOptions .col-md-4 li span {
            color: black;
            padding: 3px 0;
            font-size: 16px;
        }

        .helpCenterOptions .col-md-4 li a:hover {
            opacity: 0.7;
        }

        .Customercare {
            background: #fff;
            border-radius: 4px;
            box-shadow: 0px 6px 10px -9px #333;
            padding: 50px 30px;
            box-sizing: border-box;

        }

        .container__form .form__label{
            width: 95%;
            margin: auto;
        }
        .container__form .form__field {
            width: 45%;
            margin: 2%;
            background: #f7f7f7;
            color: #a3a3a3;
            font: inherit;
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.1);
            border: 0;
            outline: 0;
            padding: 20px 18px;
            box-sizing: border-box;
            border-radius: 8px;
        }

        .container__form .form__field.full {

            width: 94%;
        }

        .container__form textarea.form__field.full {
            height: 130px;
        }

        .Customercare .container__form .form {
            margin: 0;
        }

        .Customercare
        .container__form .form__field {
            box-shadow: none;
            border-radius: 4px;
            background: #f3f5f7;;
            padding: 15px 18px;;
        }

        .Customercare h4, .faqsCont h4 {
            color: #343a40;
            font-size: 35px;
        }

        .Customercare p {
            margin-top: 20px;
            font-size: 17px;
        }

        .search-form {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 30px;
        }

        .screen-reader-text {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        .search-form input[type=search] {
            width: 100%;
            border-radius: 2px;
            font-family: inherit;
            border: 0;
            font-size: 15px;
            -webkit-appearance: none;
            padding: 12px 10px;
            outline: 0;
            -webkit-box-shadow: inset 1px 1px 1px rgba(0, 0, 0, 0.3);
            box-shadow: inset 1px 1px 1px rgba(0, 0, 0, 0.3);
            width: 100%;
        }

        .search-form input[type=search]:focus {
            background: white;
        }

        .container__form .btn {
            margin: auto;
            display: block;

        }

        .faqs {
            padding-bottom: 150px;
        }

        .faqs .heading_1 {
            padding-bottom: 50px;
        }

        .card {
            margin-top: 2px;
        }

        .btn-link.collapsed {
            cursor: pointer;
        }


        .items_abo{
            text-align: center;
            border: 1px solid #e2e2e2;
            border-radius: 6px;
            padding: 15px;
            min-height:240px;
        }
        .items_abo img{
            width: 100px;
        }
        .items_abo h3{
            margin-bottom: 15px;
            font-size: 20px;
        }
        .items_abo p{
            font-size: 14px;
        }
        .three_block{
            margin-top: 30px;
        }
        .internal_pages{
            margin-bottom: 60px;
            padding-top: 70px;
        }
        /*======= contact_us ========*/
        .list_info li{
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .list_info li:last-child{
            border-bottom: 0;
        }
        .list_info li small{
            display: block;
            margin-top: 8px;
            font-size: 14px;
            color: #55c4e0;
        }
        .list_info li span{
            font-family: 'Cairo', sans-serif;
            font-size: 14px;
        }
        .list_info li span i{
            margin-left: 10px;
        }
        .awe{
            font-size: 20px !important;
        }

        .row .contactus-wall:last-child
        {
            border-right: 1px solid #ccc;
        }
        @media only screen and (max-width: 767px) {
            .contactus-wall
            {
                margin-bottom: 50px;
            }
            .row .contactus-wall:last-child
            {
                border-right: 0px solid #ccc;
            }
        }
        /*======= about_us =========*/
        #about_us{
            margin-bottom: 70px;
        }
        .offset-lg-1{
            margin-right: 8.333333%;
            margin-left: inherit;
        }
        .title_sec h2{
            font-weight: bold;
            font-size: 24px;
            position: relative;
        }
        .title_sec h2:before{
            content: "";
            position: absolute;
            bottom: -13px;
            background-color: #666;
            height: 1px;
            width: 40px;
        }
        .details_about h4{
            font-size: 21px;
            color: #333;
            line-height: 33px;
        }
        .title_sec{
            margin-bottom: 40px;
        }
        .details_about p{
            margin-top: 20px;
            font-size: 15px;
            line-height: 33px;
        }
        .btn-primary{
            margin-top: 20px;
            background-color: #0058a9;
            border:none;
            text-align: center;
            font-size: 14px;
            max-width: 165px;
            line-height: 2.5;
        }
        .btn-primary:hover{
            background-color: #1ebde4;
            border:none;
            box-shadow: none;
        }

        .btn-secondary{
            margin-top: 20px;
            background-color: #0058a9;
            color: snow;
            border:none;
            text-align: center;
            font-size: 14px;

            line-height: 2.5;
        }
        .btn-secondary:hover{
            background-color: #8adcf0;
            border:none;
            box-shadow: none;
        }
        .btn-dark{
            margin-top: 20px;
            background-color: #0058a9;
            border:none;
            text-align: center;
            font-size: 14px;
            max-width: ;
            line-height: 2.5;
        }
        .btn-dark:hover{
            background-color: #8adcf0;
            border:none;
            box-shadow: none;
        }


    </style>
    <section class="helpCenterPage mt">
        <div class="mega-header docs-header">
            <div class="site-width row">
                <h2 class="heading_1 col-md-6 ">
<span style="font-size: 20px;">   شركه الحوشبي للصرافه  التحويلات</span>
                    <span>| مركز المساعدة</span></h2>

                {{--<div class="searchFormCon col-md-6">--}}
                    {{--<div class="search-form">--}}
                        {{--<form>--}}
                            {{--<div>--}}
                                {{--<label class="screen-reader-text" for="faq_search">مركز المساعدة</label>--}}
                                {{--<input type="search" name="search" class="search-input" id="faq_search"--}}
                                       {{--placeholder="ابحث هنا...">--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
        <div class="searchFaq">
            <div class="mb-5 mt-5">
                <div class="Customercare site-width  row ">
                    <div class="col-md-5">
                        <h4>مرحباً بك في قسم المساعدة
                        </h4>
                        <p>
                            لإرسال شكوى او اقتراح ، يرجى التواصل معنا عبر نموذج ارسال الاقتراحات والشكاوي
                        </p>

                        <div class="fh5co-contact-info">
                            <div class="col-lg-6 contactus-wall">
                                <div class="details_about marg_0">
                                    <div class="title_sec">
                                        <h2 class="awe">معلومات التواصل معنا</h2>
                                    </div>
                                    <ul class="list_info">
                                        <li>
                                            <span> <i class="fa fa-envelope"></i> البريد الإلكترونى</span>
                                            <a href="mailto:hbfast@gmail.com"><small>info@hbfast.com</small></a>
                                        </li>
                                        <li>
                                            <span> <i class="fa fa-phone"></i>رقــم الجوال</span>
                                            <small style="direction:ltr">+967-770027440 </small>
                                        </li>
                                        <li>
                                            <span> <i class="fa fa-phone"></i>رقــم الجوال</span>
                                            <small style="direction:ltr">8001515  - 771-110-033</small>
                                        </li>
                                        <li>
                                            <span> <i class="fa fa-pencil-alt"></i>صفحتنا على الفيس بوك</span>
                                            <a href="https://www.facebook.com/Engaz.p"><small>https://www.facebook.com/hbfast</small></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        </p>

                    </div>
                    <div class="col-md-7">
                       @if (count($errors)>0)
                           <div class="alert alert-danger">
                               <ul>
                               @foreach($errors->all() as $error )
                                   <li>
                                       {{$error  }}
                                   </li>
                                   @endforeach
                               </ul>
                           </div>
                           @endif
                           <div class="contact-form">
                        <div class=" container__form">
                            <div class="container__item">
                                <form method="POST" action="{{ route('help.store') }}" accept-charset="UTF-8" class="form-container clearfix" id="contact-form">
                                    @csrf

                                    @if(Session::has('success'))
                                        <div class="alert alert-success">
                                            {{Session::get('success')}}
                                        </div>
                                    @endif

                                    <div class="clearfix">
                                        <input name="name" type="text"  placeholder="الاسم" value="{{Request::old('name')}}" class="form__field required">


                                        <input name="phone" type="text" placeholder="التلفون" value="{{Request::old('phone')}}"  class="form__field phone  num required" class="form__field required">

                                        <input name="email" type="email" placeholder="البريد الالكتروني" value="{{Request::old('email')}}" class="form__field required" >
                                        <input name="subject" type="text" placeholder="الموضوع" value="{{Request::old('subject')}}" class="form__field required">
                                        <div>

                                            <select name="send_for" class="form__field required full" id="sentto">
                                                <option value="استفسار عام">ارسال الى قسم :</option>
                                                <option value="مركز المساعدة">مركز المساعدة</option>
                                                <option value="الشكاوي والاقتراحات">الشكاوي والاقتراحات</option>
                                            </select>

                                        </div>

                                        <textarea name="message" type="text"   placeholder=" استفسار او اقتراح او شكوى ..." value="{{Request::old('message')}} " class="form__field required full"></textarea>




                                    </div>
                                    <button type="submit" class="btn btn-dark">ارسل الآن</button>


                                </form>
                            </div>


                        </div>
                    </div>

                </div>


                </div>
            <br>
            <section class="faqs ">
                <div class="heading text-center site-width featured ">
                    <h2 class="heading_1 mb-3 ">الأسئلة الشائعة</h2>
                </div>
                <div class="site-width">
                    <div id="accordion">

                        <div class="card">
                            <div class="card-header" id="heading1">
                                <h5 class="mb-0">
                                    <button class=" btn-link " data-toggle="collapse"
                                            data-target="#collapse1"
                                            aria-expanded="true"
                                            aria-controls="collapse1">
                                        متى أوقات الدوام ؟
                                    </button>
                                </h5>
                            </div>

                            <div id="collapse1" class="collapse show"
                                 aria-labelledby="heading1" data-parent="#accordion">
                                <div class="card-body">
                                    <p>&nbsp;</p>

                                    <p><strong>من السبت إلى الخميس</strong></p>

                                    <p>من الساعه 8 صباحا وحتى الساعه 1 ظهرا &ndash; من الساعه 4 عصرا وحتى الساعه 9 مساءا</p>

                                    <p><br />
                                        <strong>الجمعه</strong><br />
                                        من الساعه 4 عصرا وحتى الساعه 8 مساءا .</p>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="heading2">
                                <h5 class="mb-0">
                                    <button class=" btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapse2"
                                            aria-expanded="false"
                                            aria-controls="collapse2">
                                        ماهي متطلبات فتح الحساب التجاري ؟
                                    </button>
                                </h5>
                            </div>

                            <div id="collapse2" class="collapse "
                                 aria-labelledby="heading2" data-parent="#accordion">
                                <div class="card-body">
                                    <p style="direction: rtl;">&nbsp;</p><p style="direction: rtl;"><strong>للشركات يتطلب فتح الحساب لدينا :</strong></p><p style="direction: rtl;">سجل تجاري وصورة البطاقة الشخصية أو جواز السفر ( ساري المفعول ) لمالك الشركة .</p>
                                </div>
                            </div>
                        </div>


                    </div>
                    <br>
                    <a href="{{URL::to('/fag')}}" class="btn btn-secondary">كافة الاسئلة الشائعة</a>
                </div>

            </section>
        </div>

    </section>

@stop