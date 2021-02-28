@extends('layouts.master')

@section('content')
    <section class="homePage">

        <div class="mainSlidersCont relative">
            <div class="mainSliders">
                @foreach($lid as $slid)
                <div>
                    <picture>
                        <source srcset="{{asset($slid -> image) }}"
                                media="(max-width: 515px)"/>

                        <source
                                srcset="{{asset($slid -> image) }}"
                                media="(max-width: 1024px)"/>
                        <source srcset=" {{asset($slid -> image) }}"/>

                        <img src="{{asset($slid -> image) }}" data-src="{{asset($slid -> image) }}" alt="{{$slid->title}}"/>
                    </picture>


                    <div class="floatDiv">
                        <div>
                            <ul class="timeline clearfix">
                                <li><span>{{$slid->title}} </span></li>

                            </ul>
                            <h4>{{$slid->description}}</h4>
                        </div>
                    </div>
                </div>
@endforeach
                {{--<picture>--}}
                    {{--<source srcset="uploads/sliders/th_50_19/about-banner.jpg"--}}
                            {{--media="(max-width: 1024px)"/>--}}

                    {{--<source srcset="/uploads/sliders/th_50_19/swaid-sliders_3.jpg"--}}
                            {{--media="(max-width: 1024px)"/>--}}
                    {{--<source--}}
                            {{--srcset="/uploads/sliders/th_1900_713/swaid-sliders_3.jpg"/>--}}

                    {{--<img src="uploads/sliders/th_50_19/swaid-sliders_3.jpg"--}}
                         {{--data-src="/uploads/sliders/th_50_19/swaid-sliders_3.jpg"--}}
                         {{--alt="خمسون عاماً من الثقة"/>--}}
                {{--</picture>--}}


                {{--<div class="floatDiv">--}}
                    {{--<div>--}}
                        {{--<h2>خمسون عاماً من الثقة</h2>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            <div>
        </div>

        </div>
        <br>
        <br>
        <section class="section-padding about-box bg-light" style="background-color: #0058a9!important; color: white;">
            <div class="container">
                <div class="row d-flex justify-content-center p-5">
                    <div class="col-lg-4 wow fadeInRight mt-3" style="visibility: visible; animation-name: fadeInRight;">
                        <img src="{{asset('theme/standard/images/mal_logo.png') }}" alt="" class="malimg" />
                    </div>
                    <div class="about_info col-lg-8 pr-0 pr-md-5 wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                        <h3 class="main-color mb-4 mt-3">
                         شركه الحوشبي للصرافه                </h3>
                        <p class="text-justify">
                            تأسست شركة الحوشبي للصرافة كمنشاة فردية محدودة في عام 2000م في محافظة اب بمديرية النادرة على يد رجل الأعمال الحاج علي صالح عبدالرب الحوشبي وأخية الأستاذ احمد صالح عبدالرب الحوشبي وتم تعديل الكيان القانوني للشركة لتصبح شركة وشبكة صرافة اعتباراً من تاريخ 2017م،تميزت الشركة بتقديم أفضل الخدمات المصرفية في القطاع المصرفي لوكلائنا وعملائنا، وبعد أن رسخت جذورها في مجال القطاع المصرفي، ...                </p>

                        <div class="pull-left clearfix link">
                            <a href="{{URL::to('/about')}}" class="theme-btn-two">إقرء المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <br>
        <section class="bg-light" style="background-color: #0058a9!important; color: white;">
            <div class=" borders">
                <div class="d-flex pt-5 justify-content-center d-lg-none section-title">
                    <h2>
                        مميزات شركه الحوشبي للصرافة
                    </h2>
                </div>
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img alt="Background Image" src="{{asset('images/banner/hb.jpg') }}" height="100%">
                    </div>
                    <div class="col-lg-7">
                        <ul class="feature-element p-5">
                            <li data-wow-delay="0.2s" class="wow zoomIn">

                                <div class="row">
                                    <div class="col-lg-5 d-none d-lg-block">
                                        <div class="line-feature">
                                            <i class="fa fa-angle-right"></i>
                                        </div>
                                        <div><i class="fa fa-hand-o-right cirle-feature d-none d-md-block"  ></i></div>
                                        <div><i class="fa fa-hand-o-up cirle-feature d-md-none"></i></div>
                                    </div>
                                    <div class="col-12 col-lg-7">
                                        <div class="text-feature">
                                            <h4 class="alt-color mb-2 ">انتشار واسع</h4>
                                            <p class="main-color text-justify">نقدم خدماتنا عبر اكثر من 1200  نقطة خدمة في الجمهورية اليمنية</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-wow-delay="0.2s" class="wow zoomIn">
                                <div class="row">
                                    <div class="col-lg-5 d-none d-lg-block">
                                        <div class="line-feature"><i class="fa fa-angle-right"></i></div>
                                        <div><i class="fa fa-hand-o-right cirle-feature d-none d-md-block"></i></div>
                                        <div><i class="fa fa-hand-o-up cirle-feature d-md-none"></i></div>
                                    </div>
                                    <div class="col-12 col-lg-7">
                                        <div class="text-feature">
                                            <h4 class="alt-color mb-2 ">سمعة حسنة</h4>
                                            <p class="main-color text-justify">يلقى نظام الحوشبي للصرافة اهتماما خاصا ويحظى بسمعة حسنة في مجال الاعمال والخدمات المصرفية الالية والمعاملات التجارية</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-wow-delay="0.2s" class="wow zoomIn">
                                <div class="row">
                                    <div class="col-lg-5 d-none d-lg-block">
                                        <div class="line-feature"><i class="fa fa-angle-right"></i></div>
                                        <div><i class="fa fa-hand-o-right cirle-feature d-none d-md-block"></i></div>
                                        <div><i class="fa fa-hand-o-up cirle-feature d-md-none"></i></div>
                                    </div>
                                    <div class="col-12 col-lg-7">
                                        <div class="text-feature">
                                            <h4 class="alt-color mb-2 ">تلبية الاحتياجات</h4>
                                            <p class="main-color text-justify">صمم  النظام لتلبية متطلبات السوق المصرفي وتحويل الاموال ، حيث يشكل البنية الأساسية التي يعتمد عليها اغلب الصرافين في اليمن .</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-wow-delay="0.2s" class="wow zoomIn">
                                <div class="row">
                                    <div class="col-lg-5 d-none d-lg-block">
                                        <div class="line-feature"><i class="fa fa-angle-right"></i></div>
                                        <div><i class="fa fa-hand-o-right cirle-feature d-none d-md-block"></i></div>
                                        <div><i class="fa fa-hand-o-up cirle-feature d-md-none"></i></div>
                                    </div>
                                    <div class="col-12 col-lg-7">
                                        <div class="text-feature">
                                            <h4 class="alt-color mb-2 ">العلاقات والتعامل</h4>
                                            <p class="main-color text-justify">علاقتنا وتعاملنا قائم على مبدئ الثقة والاعتمادية والثبات.</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>



            <section class="news-section blog-grid blog-page section-padding overlay-style-one sec-pad-2">
                <div class="container">
                    <div class="row">
                        <div class="text-center col-sm-12 mb-2 section-title">
                            <h2>
                                آخر الأخبار                </h2>

                        </div>
@foreach($news as $n)
                        <div class="col-lg-4 col-md-6 col-sm-12 news-column">
                            <div class="single-news-content inner-box inner-box-news">
                                <figure class="image-box">
                                    <img src="{{ asset($n->news_img)}}"
                                         alt="{{ $n->news_title }}" width="310" height="235">
                                    <!--Overlay Box-->
                                    <div class="overlay-box">
                                        <div class="overlay-inner">
                                            <div class="content">
                                                <a href="{{URL::to('news/details/'.$n->id) }}"
                                                   class="link"><i
                                                            class="icon fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                                <div class="lower-content">
                                    <h4>
                                        <a style="height: 100px" href="{{ url('news/details/'.$n->id) }}"> {{ $n->news_title }} </a>
                                    </h4>

                                    <div class="num" style="color: #00A8FF;">{{   date('Y-m-d', strtotime ($n-> created_at))  }}</div>
                                    <div class="text">
                                        <p class="text-justify">{{ str_limit($n->news_desc,200,'...') }}</p>
                                    </div>
                                    <div class="link"><a href="{{ url('news/details/'.$n->id) }}"
                                                         class="theme-btn-two">قراءة المزيد</a></div>

                                </div>
                            </div>
                        </div>

@endforeach
                    </div>
                </div>
            </section>



        <div class="helpContainer site-width mb-5">
            <div>
                <div class="snippet">
                    <h3>كيف يمكننا أن نساعدك</h3>
                    <a href="{{URL::to('/help')}}"
                       class="btn btn-secondary border"> مركز المساعدة</a>

                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL::to('/locations')}}">فروع الشركة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{URL::to('/fag')}}">الاسئله الشائعة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL::to('/services')}}">الخدمات والمنتجات</a>
                    </li>

                </ul>
            </div>
        </div>
        <section class=" section section-padding bg-light">
            <div class="container">
                <div class="row gap-y align-items-center">
                    <div class="col-lg-12">
                        <div class="text-center zoomIn pb-5 section-title">
                            <h2>
                                قيمنا                    </h2>
                        </div>
                        <div class="row d-flex justify-content-center pb-5">
                            <div class="col-6 col-md-3 col-lg-2 mb-5 px-4 wow flipInX">
                                <a class="card card-body border hover-shadow-6 text-center py-6">
                                    <p><img src="{{asset('images/icons/Value_2020_Aug_09_13_57_55222-01.png') }}" class="mb-2"/>
                                    </p>
                                    <h6 class="mb-0"
                                        style="font-size: 14px">الأمانة</h6>
                                </a>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2 mb-5 px-4 wow flipInX">
                                <a class="card card-body border hover-shadow-6 text-center py-6">
                                    <p><img src="{{asset('images/icons/Value_2020_Aug_09_13_58_25222-06.png') }}" class="mb-2"/>
                                    </p>
                                    <h6 class="mb-0"
                                        style="font-size: 14px">الثقة</h6>
                                </a>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2 mb-5 px-4 wow flipInX">
                                <a class="card card-body border hover-shadow-6 text-center py-6">
                                    <p><img src="{{asset('images/icons/Value_2020_Aug_09_13_58_35222-03.png') }} " class="mb-2"/>
                                    </p>
                                    <h6 class="mb-0"
                                        style="font-size: 14px">السرعة</h6>
                                </a>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2 mb-5 px-4 wow flipInX">
                                <a class="card card-body border hover-shadow-6 text-center py-6">
                                    <p><img src="{{asset('images/icons/Value_2020_Aug_09_13_58_47222-04.png') }} " class="mb-2"/>
                                    </p>
                                    <h6 class="mb-0"
                                        style="font-size: 14px">الخصوصية</h6>
                                </a>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2 mb-5 px-4 wow flipInX">
                                <a class="card card-body border hover-shadow-6 text-center py-6">
                                    <p><img src="{{asset('images/icons/Value_2020_Aug_09_14_01_09%d8%a7%d9%8a%d9%82%d9%88%d9%86%d8%a7%d8%aa-%d8%a7%d9%84%d9%85%d9%88%d9%82%d8%b9-.png') }}" class="mb-2"/>
                                    </p>
                                    <h6 class="mb-0"
                                        style="font-size: 14px">المصداقية</h6>
                                </a>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2 mb-5 px-4 wow flipInX">
                                <a class="card card-body border hover-shadow-6 text-center py-6">
                                    <p><img src="{{asset('images/icons/Value_2020_Aug_09_13_59_17222-05.png') }}" class="mb-2"/>
                                    </p>
                                    <h6 class="mb-0"
                                        style="font-size: 14px">الإلتزام</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <div class="partnersSlidersContainer site-width">
            <h2 class="heading_2 text-center pb-5">الوكالات الدولية  </h2>

            <div class="partnersSliders  row">
                @foreach( $par as $par)
                <div class="img-container col-6 col-md-3 mb-5">

                    <a href="#" data-toggle="modal" data-target="#{{$par->model}}"><img src="{{$par->logo}}"  alt="{{$par->title}}"/></a>

                    <!-- Modal -->
                    <div class="modal fade" id="{{$par->model}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content"
                                 style="border-top: 10px solid  #8F119B">
                                <div class="modal-header" style="border: none">
                                    <h5 id="exampleModalLabel"><img class="mb-3"
                                                                    style="max-width: 180px;padding-top: 10px;display: inline-block"
                                                                    src="{{$par->logo}}"
                                                                    alt="دبي ريميت}"/>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <img src="{{$par->image}}"
                                     alt="{{$par->title}}"/>
                                <div class="modal-body">
                                    <h3 class="modal-title">{{$par->title}}</h3>
                                    <p>{{$par->description}}<br /><br />للمزيد <a target="_blank" href="{{$par->link}}#">إنقر هنا</a></p>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                @endforeach

            </div>
            <a href="#" class="btn" id="load-more-partners"> <span>+</span> اقرأ المزيد </a>

        </div>


        <div class="partnersSlidersContainer site-width">
            <h2 class="heading_2 text-center pb-5">الخدمات البنكية  </h2>

            <div class="partnersSliders1  row">
                @foreach($Banks as $local)
                    <div class="img-container col-6 col-md-3 mb-5">

                        <a href="{{URL::to('localservices/'.$local->id) }}" data-toggle="#" ><img src="{{$local->image}}"  alt="{{$local->name}}"/></a>

                        {{--<!-- Modal -->--}}
                        {{--<div class="modal fade" id="{{$local->model}}" tabindex="-1" role="dialog"--}}
                             {{--aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
                            {{--<div class="modal-dialog modal-lg" role="document">--}}
                                {{--<div class="modal-content"--}}
                                     {{--style="border-top: 10px solid  #8F119B">--}}
                                    {{--<div class="modal-header" style="border: none">--}}
                                        {{--<h5 id="exampleModalLabel"><img class="mb-3"--}}
                                                                        {{--style="max-width: 180px;padding-top: 10px;display: inline-block"--}}
                                                                        {{--src="{{$par->logo}}"--}}
                                                                        {{--alt="دبي ريميت}"/>--}}
                                        {{--</h5>--}}
                                        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                            {{--<span aria-hidden="true">&times;</span>--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                    {{--<img src="{{$par->image}}"--}}
                                         {{--alt="{{$par->title}}"/>--}}
                                    {{--<div class="modal-body">--}}
                                        {{--<h3 class="modal-title">{{$par->title}}</h3>--}}
                                        {{--<p>{{$par->description}}<br /><br />للمزيد <a target="_blank" href="#">إنقر هنا</a></p>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}

                    </div>

                @endforeach
            </div>
            <a href="#" class="btn" id="load-more-partners"> <span>+</span> اقرأ المزيد </a>

        </div>


<div>
        <center><button type="#" name="اسعار البيع والشراء  اخر تحديث"   class="btn btn-primary form-control" style="width:100%;float:center;hight:2px;margin-top: 28px;">اسعار البيع والشراء  اخر تحديث </button>

            </center>


            <div id='content' class='ly-content column'>
                <section id='main' class=''>
                    <div class='section'>
                        <div>
                            <div class='newsLanding clearfix'>
                                <div class='box clearfix' style='  '>
                                    <table style='position: relative; width:100%;border: 1px solid #bbb;font-family: Droid Arabic Kufi; font-size: 14px;'>
                                        <tbody>
                                        <tr>
                                            <td style='border: 1px solid #bbb;width: 100%; text-align:center;font-size: 15px;color:#008800;background-color:#E7E7E7;' colspan='6'>
                                                <span class='dots blink_me'></span>

                                                صنعاء
                                                @isset($sana)
                                                <span class='datemenu' dir='rtl'> {{$sana[0]->updated_at}}</span>
                                                @endisset
                                            </td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td style='background-color: antiquewhite; border: 0px solid #bbb;width:  6%;'>&nbsp;</td>
                                            <td style='background-color: antiquewhite;border: 0px solid #bbb;width:11%; ;vertical-align: middle;=;' cellpadding="0" >العملة</td>
                                            <td style='background-color: antiquewhite;border: 0px solid #bbb;width: 10%; text-align:center;vertical-align: middle;'>شراء</td>
                                            <td style='background-color: antiquewhite;border: 0px solid #bbb;width: 12%; text-align:center;vertical-align: middle;'>بيع</td>
                                            <td style='background-color: antiquewhite;border: 0px solid #bbb;width: 10%;'> </td>

                                            <td style='background-color: antiquewhite;border: 0px solid #bbb;width: 11%; text-align:center;vertical-align: middle;'>اخر تحديث</td>
                                        <tr>
                                        </tbody>
                                    </table>
                                    @isset($sana)
                                    @foreach( $sana as $par)
                                            <table style='position: relative;  width:100%;border: 1px solid #bbb;font-family: Droid Arabic Kufi; font-size: 14px;'>
                                                <tbody>



                                                <tr>
                                                    <div class='container-fluid'>
                                                        <td style='border: 1px solid #bbb;width: 9%; text-align:center;padding:5px;vertical-align: middle;'><img src='{{asset('theme/img/'.$par->imagee) }}  ' style="display: inline ;  width:15px"></td>
                                                        <td style='border: 1px solid #bbb;width:	110px; text-align:right;padding:5px 10px;vertical-align: middle;'> {{$par->cur_name}} </td>
                                                        <td style='border: 1px solid #bbb;width: 110px; text-align:center;vertical-align: middle;'><span style=''> {{$par->cur_buy}} </span></td>
                                                        <td style='border: 1px solid #bbb;width: 110px; text-align:center;vertical-align: middle;'><span style=''>{{$par->cur_sell}} </span></td>
                                                        <td style='border: 1px solid #bbb;width: 110px; text-align:center;vertical-align: middle;'><img src='{{asset('theme/img/'.$par->stutes) }} ' style="display: inline ;  width:15px"></td>

                                                        <td style='border: 1px solid #bbb;width: 100px; text-align:center;vertical-align: middle; font-size:13px;color:#777;'> {{$par->updated_at}} </td>
                                                    </div>
                                                </tr>
                                                </tbody>
                                            </table>
                                    @endforeach
                                    @endisset

                                </div>
                            </div>
                        </div>
                    </div>

    </section>


            <div id='content' class='ly-content column'>
                <section id='main' class=''>
                    <div class='section'>
                        <div>
                            <div class='newsLanding clearfix'>
                                <div class='box clearfix' style='  '>
                                    <table style='position: relative; width:100%;border: 1px solid #bbb;font-family: Droid Arabic Kufi; font-size: 14px;'>
                                        <tbody>
                                        <tr>
                                            <td style='border: 1px solid #bbb;width: 100%; text-align:center;font-size: 15px;color:#008800;background-color:#E7E7E7;' colspan='6'>
                                                <span class='dots blink_me'></span>
                                                عدن
                                                @isset($aden)
                                                <span class='datemenu' dir='rtl'> {{$aden[0]->updated_at}}</span>
                                                @endisset
                                            </td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td style='background-color: antiquewhite; border: 0px solid #bbb;width:  6%;'>&nbsp;</td>
                                            <td style='background-color: antiquewhite;border: 0px solid #bbb;width:11%; ;vertical-align: middle;=;' cellpadding="0" >العملة</td>
                                            <td style='background-color: antiquewhite;border: 0px solid #bbb;width: 10%; text-align:center;vertical-align: middle;'>شراء</td>
                                            <td style='background-color: antiquewhite;border: 0px solid #bbb;width: 12%; text-align:center;vertical-align: middle;'>بيع</td>
                                            <td style='background-color: antiquewhite;border: 0px solid #bbb;width: 10%;'> </td>

                                            <td style='background-color: antiquewhite;border: 0px solid #bbb;width: 11%; text-align:center;vertical-align: middle;'>اخر تحديث</td>
                                        <tr>
                                        </tbody>
                                    </table>
                                    <table style='position: relative;  width:100%;border: 1px solid #bbb;font-family: Droid Arabic Kufi; font-size: 14px;'>
                                        <tbody>

                                        @foreach( $aden as $par)

                                        <tr>
                                            <div class='container-fluid'>
                                                <td style='border: 1px solid #bbb;width: 9%; text-align:center;padding:5px;vertical-align: middle;'><img src='{{asset('theme/img/'.$par->imagee) }}  ' style="display: inline ;  width:15px"></td>
                                                <td style='border: 1px solid #bbb;width:	110px; text-align:right;padding:5px 10px;vertical-align: middle;'> {{$par->cur_name}} </td>
                                                <td style='border: 1px solid #bbb;width: 110px; text-align:center;vertical-align: middle;'><span style=''> {{$par->cur_buy}} </span></td>
                                                <td style='border: 1px solid #bbb;width: 110px; text-align:center;vertical-align: middle;'><span style=''>{{$par->cur_sell}} </span></td>
                                                <td style='border: 1px solid #bbb;width: 110px; text-align:center;vertical-align: middle;'><img src='{{asset('theme/img/'.$par->stutes) }} ' style="display: inline ;  width:15px"></td>

                                                <td style='border: 1px solid #bbb;width: 100px; text-align:center;vertical-align: middle; font-size:13px;color:#777;'> {{$par->updated_at}} </td>
                                            </div>
                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>


                </section>
            </div>





        <div class="locations site-width mt-5 mb-5">
            <div class="row">
                <div class="col-md-8">
                    <img src="theme/standard/images/map.jpg" alt=""/>

                </div>
                <div class="col-md-4 ">
                    <div class="textCont ">
                        <div class="text ">
                            <h4 class="pb-3">تعرف على اقرب فرع لك من شبكتنا المنتشرة</h4>
                            <a href="{{URL::to('/locations')}}"
                               class="btn btn-secondary border">اقرأ المزيد</a>

                        </div>
                    </div>
                </div>
            </div>
            <p class="para_1 text-center">كن على اطلاع دائم بخدماتنا الجديدة والعروض الخاصة

            </p>


        </div>
            </div>
    </section>


@endsection
