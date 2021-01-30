
@extends('layouts.master')

@section('content')
    <style>
        .contactPage > div.featured {
            padding-top: 50px;
            padding-bottom: 100px;
        }

        .heading .para_1 {
            max-width: 500px;
        }

        .heading h1 {
            text-align: center;
            font-size: 50px;
            padding: 45px 0;
        }

        .heading h4 {
            text-align: center;
            font-size: 20px;
            color: gray;
            /* padding: 20px 0; */
            line-height: 30px;
        }

        /*.contact-form form > div {*/
        /*margin-bottom: 30px;*/
        /*!*min-height: 60px;*!*/
        /*text-align: left;*/
        /*}*/

        .contact-form input, .get-updates input {
            /*height: 100%;*/
            transition-duration: 0.3s;
            width: 100%;
            line-height: 20px;
            padding: 15px 30px;
            text-align: right;
            border: none;
            border-radius: 5px;
            background: #f3f3f3;

        }

        /*.contact-form input:focus, .contact-form .msg:focus, .get-updates input:focus {*/
        /*box-shadow: 0 0 5px 0 #ccc;*/
        /*outline: none;*/
        /*}*/

        /*.contact-form input::placeholder, .contact-form .msg::placeholder, .get-updates input::placeholder {*/
        /*color: #b9b9b9;*/
        /*}*/

        /*.contact-form .small-input input {*/
        /*width: 48%;*/
        /*float: left;*/
        /*}*/

        /*.contact-form .small-input input:nth-child(1) {*/
        /*float: right;*/
        /*}*/

        .contact-form textarea.msg {
            min-height: 250px;
            height: 100%;
            transition-duration: 0.3s;
            width: 100%;
            line-height: 30px;
            padding: 17px 30px;
            text-align: right;
            border: none;
            border-radius: 5px;
            resize: none;
            background-color: #f3f3f3;
            background-image: url("theme/standard/images/mal_logo.png");
            background-size: contain;
            background-repeat: no-repeat;
            background-position: left bottom;
        }

        .contact-form button:focus, .contact-form button:hover, .get-updates button:focus, .get-updates button:hover {
            outline: none;
        }

        .get-updates {
            background-color: #fafafa;
        }

        .get-updates h1 {
            text-align: center;
            font-size: 50px;
            padding: 45px 0;
        }

        .get-updates h4 {
            text-align: center;
            font-size: 20px;
            color: gray;
            /* padding: 20px 0; */
            line-height: 30px;
        }

        .get-updates input {
            padding: 11px 40px;
        }

        .get-updates form > div {
            display: inline-block;
            padding: 0px 16px;
            margin-top: 11px;
        }

        .get-updates form {
            margin-top: 70px;
        }

        .contact-form {
            margin: auto;
            max-width: 650px;
            width: 90%;
            padding-bottom: 100px;
        }

    </style>

    <section class="contactPage">
        <div class="heading text-center site-width featured">
            <h3 class="text-center alt-color mb-4 mt-2">
                ابقى على تواصل معنا. نحن هنا لمساعدتك                </h3>
            <p class="para_1">هل يوجد لديك اي سؤال او استفسار عن خدماتنا ؟ لا تتردد في اخبارنا و نعدك سنبذل قصارى جهدنا لمساعدتك</p>


        </div>
        @include('admin.includes.alerts.success')
        @include('admin.includes.alerts.errors')
        <div class="contact-form">

            <form method="POST" action="{{ route('contact.store') }} " accept-charset="UTF-8" class="form-container clearfix" id="contact-form">
                @csrf
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif

                <div class="row">
                    <div class=" col-md-6 mb-4  ">
                        <input name="name" type="text"  placeholder="الاسم" value="{{Request::old('name')}}"  >
                        <!-- Error -->
                        @error("name")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class=" col-md-6 mb-4">
                        <input name="email" type="email" placeholder="البريد الالكتروني" value="{{Request::old('email')}}"  >
                        {{--<input name="section" type="hidden" class="required" value="استفسار عام">--}}
                        @error("email")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class=" col-md-6 mb-4">
                        <input name="phone" type="text" placeholder="التلفون" value="{{Request::old('phone')}}" >
                        @error("phone")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        {{--@if ($errors->has('phone'))--}}
                            {{--<div class="alert alert-danger">--}}
                                {{--{{$message}}--}}
                            {{--</div>--}}
                        {{--@endif--}}
                    </div>
                    <div class=" col-md-6 mb-4">
                        <input name="subject" type="text" placeholder="الموضوع" value="{{Request::old('subject')}}" class="">
                        @error("subject")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        {{--@if ($errors->has('subject'))--}}
                            {{--<div class="alert alert-danger">--}}
                                {{--{{$message}}--}}
                            {{--</div>--}}
                        {{--@endif--}}
                    </div>
                    <div class=" col-md-12 mb-4">
                        <textarea name="message" type="text"   placeholder=" استفسار او اقتراح او شكوى ..." value="{{Request::old('message')}} " class="msg " ></textarea>
                        @error("message")
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                      {{----}}
                        {{--@if ($errors->has('message'))--}}
                            {{--<div class="alert alert-danger">--}}
                                {{--{{$message}}--}}
                            {{--</div>--}}
                        {{--@endif--}}
                    </div>
                    <div class=" col-md-12">
                        <button type="submit" class="btn btn-dark">ارسل الآن</button>

                    </div>
                </div>
            </form>
        </div>

        <div class="contact">
            <div class="site-width">

                <div class="row">
                    <div class="col-md-6" style="float: right;">
                        <div class="row contact-info">
                            <div class="col-md-12">
                                <h6>
                                    شركه الحوشبي للصرافه والتحويلات<p>
                                        <strong>
                                            اليمن
                                        </strong>
                                    </p>

                                    <p>
                                        صنعاء المركز الرئيسي
                                    </p>

                                    <p>
                                        22 مايو تقاطع شارع تعز
                                    </p>
                                </h6>
                            </div>
                        </div>

                    </div>
                    @if(isset($flag) && $flag === 1)
                        <div class="alert alert-success">add record successful</div>
                    @endif`
                    <div class="col-md-6">

                        <span>التلفون</span>
                        <a href="tel:+9671537676"><strong class="num">770027440</strong></a>
                        <span>الرقم المجاني</span>
                        <a href="tel:8001515"><strong class="num"> 8001515</strong></a>
                    </div>
                    <div class="col-md-2">
                        <div class="thumbnail hover-up">
                            <div class="caption">
                                <a href=" {{URL::to('/fag')}}"
                                   style="background-image: url('theme/standard/images/faqs-icon.png');"><span
                                            class="hover-up">الأسئلة الشائعة</span></a>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="thumbnail hover-up">
                            <div class="caption">
                                <a href=" {{URL::to('/help')}}"
                                   style="background-image: url('theme/standard/images/helpcenter-icon.png');"> <span
                                            class="hover-up">مركز المساعدة</span></a>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-2">
                        <div class="thumbnail hover-up">
                            <div class="caption">
                                <a href=" {{URL::to('/locations')}}"
                                   style="background-image: url('theme/standard/images/brancges-icon.png');"> <span
                                            class="hover-up">فروع الشركة</span></a>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>

                <div class="site-width">
               <div class="gmap_canvas"><iframe width="100%" height="50%" id="gmap_canvas" src="https://maps.google.com/maps?q=%D8%B4%D8%B1%D9%83%D8%A9%20%D8%A7%D9%84%D8%AD%D9%88%D8%B4%D8%A8%D9%8A%20%D9%84%D9%84%D8%B5%D8%B1%D8%A7%D9%81%D8%A9%D8%8C%20%D9%85%D8%AF%D9%8A%D8%B1%D9%8A%D8%A9%20%D8%A7%D9%84%D8%B3%D8%A8%D8%B9%D9%8A%D9%86%D8%8C%20%D8%B5%D9%86%D8%B9%D8%A7%D8%A1%E2%80%8E%D8%8C%D8%8C%20Yemen&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://torrent9-fr.com"></a></div><style>.mapouter{position:relative;text-align:right;height:532px;width:829px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;}</style></div>

            </div>
    </section>

@stop