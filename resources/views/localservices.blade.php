


@extends('layouts.master')

@section('content')
    <section class="servicesPage">

        <div class="banner background"style="background-image: url( {{ asset('images/banner/hb3.jpg') }});">

            <div class="site-width relative">

                <div class="floatDiv">
                    <div>
                        <div class="flex-parent">
                            <div class="input-flex-container">
                                <div class="input">
                                    <span data-year="1910" data-info="headset"></span>
                                </div>
                                <div class="input">
                                    <span data-year="1920" data-info="jungle gym"></span>
                                </div>
                            </div>
                        </div>
                        <h2> باقة من الخدمات المصرفية التي نمنحك  أياها من  {{$banks[0]->name}} </h2>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="bg-1 exchangeServices">--}}
            {{--<div class="site-width">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-6">--}}
                        {{--<h2>باقة من الخدمات المصرفية التي تمنحك حياة أسهل</h2>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6 mt-4">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-6 col-sm-6 text-left  text-left ">--}}
                                {{--<a href=" #"--}}
                                   {{--class="btn btn-light border">اتش بي فاست موبايل</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-6 col-md-6 text-right ">--}}
                                {{--<a href=" #mal"--}}
                                   {{--class="btn btn-secondary">ايش الخدمه التانية</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="site-width">--}}

            {{--<div class="snippet">--}}
                {{--<p class="para_1 right">نسعى في شكره الحوشبي  لان نقدم نموذجا يمنيا متفردا يحتذى به، ولدينا اعتقاد كبير--}}
                    {{--بعد تواصلك معنا ستكون قادرًا على التعرف على كافة خدماتنا، فخدمات القطاع المصرفي متنوعة وكثيرة، وقد سعينا بكل طاقتنا أن نكون على دراية بها</p>--}}

                {{--<a href="#" class="btn btn-light border"data-toggle="modal"--}}
                   {{--data-target="#swaid-mobile"> اقرأ المزيد</a>--}}
            {{--</div>--}}
            <div class="modal fade" id="swaid-mobile" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"
                                id="exampleModalLabel"> خدماتنا:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <img src=" {{asset('images/banner/hb.jpg') }} "
                             alt=" خدماتنا:"/>
                        .
                        <div class="modal-body">
                            <p>و لكي نكون شركائكم في نجاح أنشطتكم التجارية، فنحن نطمح إلى أن نكسب ثقة عملائنا؛ ولهذا حاولنا أن نقوم بعمل دراسة شاملة للسوق واحتياجاته، وبعد أن تعرفنا عليها قُمنا بالاستعانة بفريق عملنا الحالي؛ والذي يُسهم في توفير الخدمات المصرفية  التي جعلتنا من أفضل الشركات في القطاع المصرفي، وقد برعنا وتميزنا في:
                                بان ما نقوم به من تطوير وتحديث في أساليب العمل سينعكس إيجابا في تعزيز مكانتنا السوقية محليا
                                واقليما.</p>
                            <div style="direction: rtl;text-align: Center; ">	أهلاً وسهلاً بكم في موقعنا،،،</div>
                            <div style="direction: rtl;text-align: Center;">	أهلاً بالمستقبل</div>

                            <br>
                            <br>
                            <div class="share">
                                <span>مشاركة</span>
                                <a href="http://www.facebook.com/sharer.php?u=https://swaidexchange.com/services/swaid-mobile"
                                   target="_blank"><i class="fa fa-facebook"></i></a>

                                <a href="https://twitter.com/intent/tweet?url=https://swaidexchange.com/services/swaid-mobile"
                                   target="_blank"><i class="fa fa-twitter"></i></a>

                                <a href="whatsapp://send?text=https://swaidexchange.com/services/swaid-mobile"><i
                                            class="fa fa-whatsapp"></i></a>

                                <a href="https://plus.google.com/share?url=https://swaidexchange.com/services/swaid-mobile"
                                   target="_blank"><i class="fa fa-google-plus"></i></a>


                            </div>
                            <br>
                            <br>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="servicesList pt-4">

            <div class="site-width">

                <ul class="row">
                    @foreach($siv as $ser)
                    <li class="col-md-4 mb-4">
                        <img style="    border-radius: 5px;"

                             src="{{asset($ser-> image) }}"
                             alt="سويد موبايل}"/>
                        <div class="card hover-up-shadow">
                            <div class="card-body">
                                <h5 class="card-title">{{$ser->title}}</h5>
                                <p class="card-text">{{$ser->description}}</p>
                                <a href="#" class="card-link" data-toggle="modal"
                                   data-target="#{{$ser->model}}"> اقرأ المزيد</a>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="{{$ser->model}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"
                                            id="exampleModalLabel">{{$ser->title}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <img src="{{asset($ser-> image) }}"
                                         alt="{{$ser->title}}"/>
.
                                    <div class="modal-body">
                                     <p>{{$ser->description}}</p>
                                        <br>
                                        <br>>
                                        <div class="share">
                                            <span>مشاركة</span>
                                            <a href="http://www.facebook.com/sharer.php?u=https://swaidexchange.com/services/swaid-mobile"
                                               target="_blank"><i class="fa fa-facebook"></i></a>

                                            <a href="https://twitter.com/intent/tweet?url=https://swaidexchange.com/services/swaid-mobile"
                                               target="_blank"><i class="fa fa-twitter"></i></a>

                                            <a href="whatsapp://send?text=https://swaidexchange.com/services/swaid-mobile"><i
                                                        class="fa fa-whatsapp"></i></a>

                                            <a href="https://plus.google.com/share?url=https://swaidexchange.com/services/swaid-mobile"
                                               target="_blank"><i class="fa fa-google-plus"></i></a>


                                        </div>
                                        <br>
                                        <br>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </li>


                    @endforeach
                </ul>

            </div>

        </div>

        {{--<div class="faqs site-width">--}}
            {{--<h4 class="heading_1">الأسئلة الشائعة</h4>--}}
            {{--<div class="bd-example bd-example-tabs">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-12 col-md-3">--}}
                        {{--<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"--}}
                             {{--aria-orientation="vertical">--}}
                            {{--<a class="nav-link  active show" id="v-pills-home-tab"--}}
                               {{--data-toggle="pill" href="#1"--}}
                               {{--role="tab"--}}
                               {{--aria-controls="v-pills-home" aria-selected="false">متى أوقات الدوام ؟ </a>--}}
                            {{--<a class="nav-link  " id="v-pills-home-tab"--}}
                               {{--data-toggle="pill" href="#2"--}}
                               {{--role="tab"--}}
                               {{--aria-controls="v-pills-home" aria-selected="false">ماهي متطلبات فتح الحساب التجاري ؟ </a>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-12 col-md-9">--}}
                        {{--<div class="tab-content" id="v-pills-tabContent">--}}
                            {{--<div class="tab-pane fade active show" id="1"--}}
                                 {{--role="tabpanel"--}}
                                 {{--aria-labelledby="v-pills-home-tab">--}}
                                {{--<p>&nbsp;</p>--}}

                                {{--<p><strong>من السبت إلى الخميس</strong></p>--}}

                                {{--<p>من الساعه 8 صباحا وحتى الساعه 1 ظهرا &ndash; من الساعه 4 عصرا وحتى الساعه 9 مساءا</p>--}}

                                {{--<p><br/>--}}
                                    {{--<strong>الجمعه</strong><br/>--}}
                                    {{--من الساعه 4 عصرا وحتى الساعه 8 مساءا .</p>--}}

                            {{--</div>--}}
                            {{--<div class="tab-pane fade " id="2"--}}
                                 {{--role="tabpanel"--}}
                                 {{--aria-labelledby="v-pills-home-tab">--}}
                                {{--<p style="direction: rtl;">&nbsp;</p>--}}
                                {{--<p style="direction: rtl;"><strong>للشركات يتطلب فتح الحساب لدينا :</strong></p>--}}
                                {{--<p style="direction: rtl;">سجل تجاري وصورة البطاقة الشخصية أو جواز السفر ( ساري المفعول--}}
                                    {{--) لمالك الشركة .</p>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}


        {{--</div>--}}
    </section>


@stop
