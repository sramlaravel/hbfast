@extends('layouts.master')

@section('content')
    <style>
        .helpCenterPage .mega-header {

            background: url('theme/standard/images/services.jpg');
            overflow: hidden;
            background-position: center;
            background-size: cover;
        }

        .helpCenterPage .mega-header {
            padding: 10px 20px;

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
    <section class="helpCenterPage mt">
    <div class="content products clearfix">
        <div class="mega-header docs-header">
            <div class="site-width row">
                <h2 class="heading_1 col-md-6 ">
                    <span style="font-size: 20px;">الحوشبي للصرافه التحويلات</span>
                    <span>|محكافحة غسل الأموال وتمويل الإرهاب</span></h2>

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
        <div class="product-title"style="    background-color: #f3f3f3;">
            {{--<img   src="{{asset('uploads\about\services-banner2_ok3o0tf1.jpg')}}"  alt="بيان سياسة مكافحة غسل الأموال وتمويل الإرهاب" style="    display: block;" />--}}
            <div class="site-width" >
                <h1 style=" text-align: center;
            font-size: 50px;
            padding: 45px 0;">بيان سياسة مكافحة غسل الأموال وتمويل الإرهاب</h1>
                <p><p dir="RTL" style="text-align: justify;">تعمل شركه الحوشبي للصرافة على تحقيق الالتزام التام بجميع ما يصدر في الجمهورية اليمنية من قوانين ولوائح وتعليمات رقابية في مجال مكافحة غسل الأموال وتمويل الإرهاب مثل قانون مكافحة غسل الأموال ولائحته التنفيذية والمنشور الدوري رقم (1) ورقم (2) لسنة 2012 مكافحة غسل الأموال وتمويل الإرهاب الصادرة عن البنك المركزي اليمني</p></p>
            </div>
        </div>
        <div class="site-width">

            <div class="site-width">
                <!------------------------------------------------------------------------------>
                <div  class="page_container clearfix">
                    <p dir="RTL" style="text-align: justify;">كما أن شركه الحوشبي للصرافة ملتزم بتطبيق توصيات مجموعة العمل المالي (<span dir="LTR">FATF</span>) وكذلك تعليمات لجنة بازل للرقابة البنكية ذات الصلة بمكافحة غسل الأموال وتمويل الإرهاب<span dir="LTR">.</span></p><p dir="RTL" style="text-align: justify;">&nbsp;</p><p dir="RTL" style="text-align: justify;">إن شركة الحوشبي للصرافة ومنذ بداية تأسيسها ملتزمة التزام كامل بجميع سياسات وإجراءات مكافحة غسل الأموال وتمويل الإرهاب وذلك بموجب قانون الجمهورية اليمينة رقم (1) لسنة 2010م بشأن مكافحة غسل الأموال وتمويل الإرهاب وكذلك بجميع الإجراءات والتوجيهات الصادرة من البنك المركزي اليمني وكذلك الالتزام الكامل بجميع توصيات مجموعة العمل


                        ) كما يوجد لدى شركة الحوشبي للصرافة دليل خاصFATF)المالي
                        بسياسات وإجراءات غسل الأموال وتمويل الإرهاب، كما تم انشاء إدارة امتثال لها استقلالية كامله في مجال عملها وكادر حصل على العديد من الدورات في مجال مكافحة غسل الأموال وتمويل الإرهاب.
                        وهناك تعاون وتواصل دائم بين إدارة الامتثال في الشركة ووحدة جمع المعلومات المالية في البنك المركزي اليمني بخصوص حالات الاشتباه والاستفسارات الواردة من وحدة جمع المعلومات.
                        كما تقوم الشركة باطلاع وتدريب موظفيها على كل المستجدات في مجال مكافحه غسل الأموال وتمويل الإرهاب.

                        <!------------------------------------------------------------------------------>
            </div>
        </div>
    </div>


        </section>
@endsection
