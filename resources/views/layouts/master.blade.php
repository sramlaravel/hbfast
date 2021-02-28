<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <title>{{ config('app.name', 'شركه اتش بي فاست') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta property="og:site_name" content="شركه اتش بي فاست"/>

    <link rel="shortcut icon" href="fav/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" sizes="120x120" href="fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="fav/icon-16x16.html">
    <link rel="manifest" href="#">
    <link rel="mask-icon" href="fav/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!--google-->
    <meta itemprop="name" content="شركة اتش بي فاست  للصرافة">
    <meta itemprop="description" content="الشركة الرائدة في تقديم أفضل الخدمات المالية والمصرفية بتقنية عاليه عبر أكبر شبكة فروع ونقاط خدمه داخل اليمن وخارجها.
">
    <meta itemprop="image" content="theme/standard/images/share.jpg">
    <!--end google-->
    <!--google-->
    <meta itemprop="name" content=" شركة الحوشيبي لللصرافة والتحويلات">
    <meta itemprop="description" content="الشركة الرائدة في تقديم أفضل الخدمات المالية والمصرفية بتقنية عاليه عبر أكبر شبكة فروع ونقاط خدمه داخل اليمن وخارجها.
">
    <meta itemprop="image" content="theme/standard/images/share.jpg">
    <!--end google-->

    <meta name="description" content="  اوائل الشركات الرائدة في مجال صرف العملات الاجنبية وتحويل الاموال في الجمهورية اليمنية  الشركة الرائدة في تقديم أفضل الخدمات المالية والمصرفية بتقنية عاليه عبر أكبر شبكة فروع ونقاط خدمه داخل اليمن وخارجها.
"/>
    <meta itemprop="name" content="شركة الحوشيبي لللصرافة والتحويلات">
    <meta itemprop="description" content="الشركة الرائدة في تقديم أفضل الخدمات المالية والمصرفية بتقنية عاليه عبر أكبر شبكة فروع ونقاط خدمه داخل اليمن وخارجها.
">
    <meta itemprop="image" content="theme/standard/images/share.jpg">
    <meta property="og:title" content="شركة الحوشيبي لللصرافة والتحويلات"/>
    <meta property="og:url" content="index.html"/>
    <meta property="og:description" content="الشركة الرائدة في تقديم أفضل الخدمات المالية والمصرفية بتقنية عاليه عبر أكبر شبكة فروع ونقاط خدمه داخل اليمن وخارجها.
"/>
    <meta property="og:image" content="theme/standard/images/share.jpg"/>

    <meta name="twitter:domain" content="شركة الحوشيبي لللصرافة والتحويلات"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:description" content="  اوائل الشركات الرائدة في مجال صرف العملات الاجنبية وتحويل الاموال في الجمهورية اليمنية ">



    <style>
        .loader {
            position: relative;
            width: 100%;
            height: 100%;
            background: rgba(250, 249, 248, 0.9);
            display: table;
            z-index: 999;
        }

        .loader div {
            vertical-align: middle;
            display: table-cell;
            text-align: center;
        }

        .loader svg {
            max-width: 100px;
            height: 100px;
        }

        .loader svg path {
            fill: transparent;
            stroke: #79000E;
            stroke-width: 2;
            stroke-dasharray: 3212.015;
            stroke-dashoffset: 3212.015;
            animation: offset 5s ease infinite;

        }

        @keyframes  offset {
            75% {
                stroke-dashoffset: 0;
            }
            100% {
                stroke-dashoffset: 3212.015;
            }
        }

        @-webkit-keyframes sinusoid {
            0% {
                -webkit-transform: scale(0.8);
                transform: scale(0.8);
            }

            50% {
                -webkit-transform: scale(1);
                transform: scale(1);
            }
            100% {
                -webkit-transform: scale(0.8);
                transform: scale(0.8);
            }
        }

        .loader span {
            height: 2em;
            color: #AAB2BD;
            overflow: hidden;
            position: absolute;
            top: 56%;
            left: 0;
            right: 0;
            width: 120px;
            text-align: center;
            margin: -1em auto;
        }

        .loader span:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            transform: translateX(-100%);
            width: 100%;
            height: 1px;
            background: #6f1917;
            opacity: 0.3;
            animation: loader-load.8s -0.1s ease-in-out infinite;
        }

        @keyframes  loader-load {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }

        @keyframes  loader-show {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }


    </style>

{{--<link href="{{asset('theme/standard/css-reset.min.css') }}" rel="stylesheet"  >--}}
{{--<link href="{{asset('theme/standard/bootstrap.min.css') }}" rel="stylesheet"  >--}}
{{--<link href="{{asset('theme/standard/mdb.rtl.css') }}" rel="stylesheet"  >--}}
{{--<link href="{{asset('theme/standard/slick.min.css') }}" rel="stylesheet"  >--}}
{{--<link href="{{asset('theme/standard/responsive.css') }}" rel="stylesheet"  >--}}


<!-- Font awesome -->

{{--<!-- Owl Carousel -->--}}
{{--<link rel="stylesheet" href="libraries/css/owl.carousel.min.css" type="text/css">--}}
{{--<link rel="stylesheet" href="libraries/css/owl.theme.default.min.css" type="text/css">--}}
{{--<!-- wow animation -->--}}
{{--<link rel="stylesheet" href="libraries/css/animate.css">--}}
{{--<!-- RS PLUGIN Styles -->--}}
{{--<link rel="stylesheet" type="text/css" href="libraries/rs-plugin/css/settings.css" media="screen"/>--}}
{{--<!-- Portfolio CSS -->--}}
{{--<link rel="stylesheet" href="libraries/css/cubeportfolio.min.css">--}}
{{--<!-- Hexagons CSS -->--}}
{{--<link rel="stylesheet" href="libraries/css/hexagons.min.css">--}}
<!-- Octagons CSS -->
    <link rel="stylesheet" href="libraries/css/custom.css">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/standard/css-reset.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('theme/standard/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('theme/standard/css-reset.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{asset('theme/standard/mdb.rtl.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('theme/standard/slick.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{asset('theme/standard/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('libraries/css/custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('theme/standard/responsive.css')}}" />
    {{--<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js')}}"></script>--}}
    <style>
        .woodmart-sticky-social {
            position: fixed;
            top: 50%;
            z-index: 399;
            display: flex;
            flex-direction: column;
            transition: -webkit-transform .3s ease 1s;
            transition: transform .3s ease 1s;
            transition: transform .3s ease 1s,-webkit-transform .3s ease 1s;
        }
        .woodmart-social-icons {
            vertical-align: middle;
            font-size: 0;
        }
        .woodmart-sticky-social .woodmart-social-icon {
            /* align-items: center; */
            /* flex-wrap: nowrap; */
            /* overflow: hidden; */
            display: flex;
            margin: 0;
            min-width: 40px;
            width: auto;

        }
        .woodmart-sticky-social.buttons-loaded {
            -webkit-transform: translate3d(0,-50%,0);
            transform: translate3d(0,-50%,0);
        }
        .woodmart-sticky-social-left {
            left: 0;
            /* -webkit-transform: translate3d(-100%,-50%,0); */
            transform: translate3d(-100%,-50%,0);
            align-items: flex-end;
        }
        .woodmart-sticky-social {
            position: fixed;
            top: 50%;
            z-index: 399;
            display: flex;
            flex-direction: column;
            transition: -webkit-transform .3s ease 1s;
            transition: transform .3s ease 1s;
            transition: transform .3s ease 1s,-webkit-transform .3s ease 1s;
        }
        .woodmart-social-icons {
            vertical-align: middle;
            font-size: 0;
        }
        .color-scheme-dark {
            color: #777;
        }


        /*.fa-whatsapp:hover{*/
        /*background: #6197ff;*/
        /*}*/




    </style>


</head>
<body>
{{--<script src="https://apps.elfsight.com/p/platform.js" defer></script>--}}
{{--<div class="elfsight-app-9900e2b0-a3a6-4433-8025-2b0bd5636945"></div>--}}

</div>
<div id="fb-root"></div>

<script>
    //    window.fbAsyncInit = function() {
    //        FB.init({
    //            appId            : '912333495590130',
    //            autoLogAppEvents : true,
    //            xfbml            : true,
    //            version          : 'v2.11'
    //        });
    //    };
    //    (function(d, s, id){
    //        var js, fjs = d.getElementsByTagName(s)[0];
    //        if (d.getElementById(id)) {return;}
    //        js = d.createElement(s); js.id = id;
    //        js.src = "https://connect.facebook.net/en_US/sdk.js";
    //        fjs.parentNode.insertBefore(js, fjs);
    //    }(document, 'script', 'facebook-jssdk'));
    window.fbAsyncInit = function() {
        FB.init({
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v8.0'
        });
    };
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = '{{asset('connect.facebook.net/ar_AR/sdk/xfbml.customerchat.js') }}';
        js.src = "https://connect.facebook.net/ar_AR/sdk/xfbml.customerchat.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
‬

<div class="loader">
    <div>

        {{--<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1"--}}
        {{--x="0px" y="0px" width="240px" height="317.29px" viewBox="0 0 240 317.29"--}}
        {{--enable-background="new 0 0 240 317.29"--}}
        {{--xml:space="preserve">--}}
        {{--<g>--}}
        {{--<path--}}
        {{--d="M36.151,314.376c0.18-0.133,0.342-0.34,0.542-0.387c3.525-0.841,7.061-1.636,10.583-2.493   c4.059-0.987,8.111-2.002,12.155-3.048c3.141-0.812,6.272-1.662,9.393-2.545c3.419-0.968,6.845-1.919,10.224-3.013   c4.76-1.54,9.505-3.133,14.209-4.835c7.869-2.847,15.436-6.361,22.742-10.451c10.241-5.733,20.03-12.13,29.105-19.589   c7.662-6.298,14.673-13.232,20.624-21.198c4.642-6.215,8.323-12.95,10.888-20.272c0.545-1.554,0.926-3.187,1.186-4.816   c0.502-3.148-0.289-6.03-2.146-8.616c-0.201-0.278-0.433-0.542-0.685-0.774c-0.85-0.78-1.566-0.697-2.252,0.255   c-0.16,0.222-0.308,0.464-0.405,0.719c-0.938,2.452-2.808,4.075-4.93,5.427c-3.431,2.187-7.202,2.58-11.166,2.05   c-3.608-0.482-5.659-2.789-7.107-5.825c-1.556-3.265-1.878-6.766-1.727-10.323c0.173-4.084,0.777-8.115,1.801-12.071   c0.677-2.615,1.601-5.147,3.189-7.378c2.713-3.81,6.938-5.102,11.351-3.475c2.503,0.922,4.901,2.055,7.138,3.515   c0.608,0.396,0.852,0.409,1.266-0.262c0.759-1.23,1.502-2.485,2.093-3.801c1.061-2.366,1.913-4.816,2.239-7.408   c0.128-1.025,0.242-2.065,0.208-3.094c-0.111-3.421-0.368-6.835-1.184-10.172c-0.252-1.033-0.699-2.016-1.034-3.03   c-0.225-0.681-0.448-1.368-0.597-2.068c-0.076-0.36-0.043-0.816,0.419-0.949c0.436-0.125,0.709,0.207,0.917,0.529   c0.282,0.433,0.546,0.881,0.78,1.342c1.639,3.234,3.266,6.473,4.902,9.708c0.296,0.585,0.581,1.181,0.93,1.734   c0.715,1.131,1.617,1.299,2.711,0.528c0.308-0.218,0.601-0.474,0.848-0.758c3.085-3.565,5.905-7.313,7.889-11.623   c1.146-2.491,1.973-5.073,2.24-7.826c0.322-3.331-0.26-6.465-1.851-9.409c-0.755-1.397-1.502-2.799-2.284-4.181   c-0.405-0.715-0.641-1.462-0.538-2.274c0.035-0.275,0.197-0.636,0.415-0.764c0.361-0.213,0.67,0.105,0.85,0.395   c0.49,0.79,1.001,1.578,1.389,2.42c1.506,3.259,2.969,6.538,4.444,9.811c0.255,0.567,0.436,1.261,1.162,1.326   c0.767,0.069,1.136-0.577,1.463-1.146c1.892-3.292,3.844-6.554,5.26-10.096c1.021-2.552,1.589-5.203,1.896-7.929   c0.358-3.174,0.395-6.331,0.029-9.512c-0.689-5.992-2.708-11.463-6.183-16.389c-1.762-2.497-3.807-4.741-6.168-6.687   c-2.227-1.836-3.28-4.373-4.301-6.99c0.53-0.253,0.856,0.068,1.192,0.253c2.308,1.27,4.456,2.776,6.467,4.474   c6.745,5.695,11.594,12.724,14.749,20.952c3.256,8.494,4.482,17.294,3.88,26.341c-0.424,6.382-1.738,12.581-4.372,18.451   c-1.681,3.745-3.817,7.198-6.631,10.208c-0.353,0.379-0.707,0.76-1.091,1.107c-0.889,0.806-1.675,0.799-2.563-0.012   c-0.341-0.312-0.654-0.655-1.13-1.136c-0.065,0.476-0.146,0.734-0.128,0.985c0.326,4.398-1.141,8.29-3.367,11.965   c-2.285,3.774-5.098,7.134-8.136,10.316c-0.596,0.625-1.189,1.255-1.814,1.85c-1.065,1.014-1.978,0.892-2.631-0.441   c-0.437-0.891-0.687-1.874-1.023-2.816c-0.192-0.539-0.345-1.102-0.944-1.645c-0.1,0.405-0.207,0.644-0.212,0.886   c-0.022,1.071-0.01,2.142-0.021,3.213c-0.016,1.394-0.21,2.768-0.781,4.042c-0.35,0.781-0.816,1.521-1.311,2.222   c-0.535,0.76-0.762,1.48-0.395,2.407c0.366,0.924,0.638,1.862,1.164,2.738c0.847,1.408,1.124,3.034,1.335,4.648   c0.536,4.098,0.511,8.206,0.109,12.31c-0.421,4.296-0.792,8.602-1.382,12.876c-1.159,8.406-3.092,16.626-6.419,24.471   c-5.104,12.035-12.962,21.863-23.589,29.476c-7.013,5.024-14.648,8.858-22.787,11.659c-3.419,1.177-6.934,2.095-10.438,3.006   c-3.741,0.972-7.513,1.832-11.286,2.674c-2.932,0.654-5.883,1.22-8.831,1.799c-3.252,0.638-6.506,1.27-9.767,1.861   c-2.752,0.5-5.513,0.944-8.272,1.4c-2.93,0.483-5.86,0.971-8.795,1.419c-3.244,0.495-6.49,0.973-9.742,1.409   c-3.801,0.509-7.606,0.985-11.414,1.433c-2.195,0.259-4.401,0.426-6.601,0.652c-0.509,0.052-1.011,0.175-1.517,0.265H36.151z"/>--}}
        {{--<path--}}
        {{--d="M232.733,194.105c-0.086,0.363-0.169,0.727-0.259,1.09c-0.52,2.095-1.763,3.552-3.807,4.298   c-0.928,0.34-1.767,0.123-2.541-0.432c-0.309-0.221-0.582-0.492-0.895-0.705c-0.834-0.569-1.474-0.387-1.72,0.583   c-0.192,0.759-0.263,1.564-0.269,2.349c-0.008,1.247-0.423,2.307-1.283,3.178c-1.218,1.234-2.715,1.533-4.39,1.259   c-0.916-0.15-1.848-0.285-2.773-0.286c-2.422-0.005-4.203,1.158-5.448,3.195c-0.639,1.047-1.026,2.201-1.189,3.402   c-0.45,3.32-0.842,6.648-1.256,9.973c-0.499,4.011-1.015,8.019-1.487,12.033c-0.318,2.709-0.58,5.425-0.853,8.14   c-0.359,3.583-1.087,7.088-2.042,10.56c-1.094,3.979-2.605,7.784-4.499,11.441c-2.765,5.339-6.467,9.935-10.942,13.944   c-8.648,7.749-18.563,13.38-29.294,17.667c-0.513,0.205-1.024,0.416-1.545,0.596c-0.257,0.089-0.535,0.156-0.805,0.161   c-0.582,0.011-0.791-0.335-0.435-0.776c0.297-0.367,0.674-0.704,1.082-0.938c1.435-0.827,2.888-1.625,4.354-2.396   c5.199-2.732,10.344-5.555,15.139-8.968c3.761-2.677,7.359-5.564,9.973-9.415c1.917-2.823,3.609-5.807,5.295-8.778   c2.73-4.811,5.054-9.82,6.947-15.021c2.549-7.001,3.947-14.223,4.16-21.674c0.143-5.008,0.254-10.018,0.489-15.022   c0.121-2.583,0.348-5.176,0.767-7.725c0.507-3.081,2.01-5.716,4.322-7.842c1.343-1.236,2.923-1.995,4.788-1.86   c0.779,0.057,1.544,0.328,2.308,0.532c0.398,0.107,0.775,0.294,1.169,0.417c1.724,0.539,3.066-0.174,3.671-1.892   c0.352-0.998,0.402-2.019,0.44-3.059c0.03-0.821,0.09-1.664,0.304-2.451c0.372-1.367,1.267-1.797,2.616-1.377   c0.326,0.102,0.637,0.262,0.944,0.415c0.37,0.185,0.724,0.403,1.094,0.589c1.584,0.791,2.727,0.286,3.079-1.45   c0.219-1.079,0.325-2.188,0.385-3.289c0.058-1.067-0.01-2.141-0.019-3.212c-0.003-0.31-0.025-0.625,0.018-0.931   c0.083-0.584,0.406-0.744,0.835-0.362c0.486,0.432,0.954,0.913,1.317,1.449c1.101,1.623,1.76,3.429,2.044,5.371   c0.04,0.268,0.139,0.528,0.211,0.791V194.105z"/>--}}
        {{--<path--}}
        {{--d="M90.688,2.914c0.254,0.153,0.49,0.355,0.764,0.453c2.793,0.994,5.361,2.364,7.484,4.474   c2.746,2.729,4.16,6.045,4.272,9.908c0.028,0.93-0.017,1.863-0.07,2.792c-0.02,0.355-0.157,0.703-0.241,1.055l-0.26,0.024   c-0.089-0.262-0.22-0.517-0.26-0.787c-0.277-1.86-0.854-3.625-1.727-5.283c-1.307-2.484-3.218-4.29-5.982-5.061   c-0.462-0.129-0.944-0.194-1.421-0.258c-0.486-0.065-0.877-0.281-1.051-0.732c-0.802-2.087-1.581-4.183-2.361-6.279   c-0.032-0.087,0.014-0.203,0.024-0.306H90.688z"/>--}}
        {{--<path--}}
        {{--d="M7.267,269.912c0.834-0.249,1.435-0.459,2.051-0.608c5.173-1.25,10.248-2.832,15.273-4.567   c8.163-2.817,16.135-6.106,23.897-9.896c4.874-2.38,9.652-4.934,14.246-7.824c0.117-0.073,0.238-0.141,0.353-0.217   c0.85-0.56,0.849-0.608,0.401-1.585c-1.095-2.383-2.213-4.756-3.255-7.163c-2.405-5.555-4.436-11.249-5.749-17.16   c-0.876-3.94-1.483-7.94-2.176-11.919c-0.516-2.959-0.985-5.927-1.464-8.893c-0.578-3.587-0.898-7.197-0.96-10.831   c-0.106-6.157,0.137-12.301,0.735-18.429c0.416-4.263,0.87-8.523,1.365-12.777c0.235-2.022,0.597-4.03,0.914-6.043   c0.135-0.851,0.146-0.9-0.649-1.273c-5.286-2.485-8.697-6.68-10.906-11.962c-1.639-3.92-2.446-8.033-2.902-12.247   c-0.62-5.738-0.43-11.463,0.14-17.177c0.349-3.502,0.891-6.988,1.441-10.467c1.563-9.885,5.213-19.008,10.26-27.599   c2.94-5.005,5.945-9.973,9.437-14.62c3.188-4.243,6.904-8.001,10.832-11.554c0.227-0.205,0.484-0.376,0.865-0.474   c-0.142,0.241-0.257,0.501-0.428,0.718c-6.102,7.746-10.878,16.308-15.38,25.035c-2.487,4.82-4.752,9.743-6.65,14.828   c-1.353,3.627-2.471,7.328-3.136,11.146c-0.503,2.89-1.032,5.784-1.334,8.698c-0.536,5.165-0.616,10.342,0.075,15.512   c0.341,2.548,0.862,5.033,2.057,7.338c1.991,3.841,5.05,6.511,8.989,8.219c0.055,0.024,0.131-0.002,0.311-0.01   c0.103-0.35,0.24-0.731,0.329-1.123c0.769-3.373,1.834-6.657,3.022-9.899c2.783-7.593,5.973-15.019,9.774-22.154   c1.402-2.633,3.36-4.97,5.068-7.44c0.091-0.132,0.207-0.247,0.364-0.298c-2.192,4.444-4.466,8.85-6.554,13.343   c-2.096,4.509-3.812,9.178-5.337,13.912c-1.524,4.731-2.844,9.518-3.875,14.432c0.213,0.112,0.376,0.248,0.559,0.287   c4.926,1.058,11.787-0.411,15.369-5.45c0.947-1.332,1.763-2.72,1.941-4.403c0.086-0.813,0.465-1.518,1.08-2.07   c0.635-0.571,1.313-0.524,1.745,0.201c0.294,0.493,0.531,1.067,0.615,1.631c0.683,4.621,0.697,9.236-0.437,13.794   c-0.709,2.853-1.951,5.454-4.032,7.599c-2.219,2.287-4.938,3.595-8.038,4.192c-3.559,0.685-7.081,0.435-10.588-0.354   c-0.225-0.051-0.465-0.036-0.786-0.058c-0.076,0.696-0.14,1.34-0.216,1.983c-0.077,0.652-0.189,1.3-0.244,1.954   c-0.55,6.545-0.925,13.099-0.843,19.671c0.066,5.357,0.164,10.72,0.869,16.035c0.457,3.452,1.148,6.878,1.84,10.294   c0.85,4.198,1.981,8.333,3.368,12.384c1.631,4.765,3.381,9.491,5.113,14.222c1.345,3.672,3.047,7.178,5.049,10.538   c0.159,0.267,0.323,0.531,0.491,0.792c0.036,0.056,0.101,0.092,0.195,0.174c0.096-0.027,0.252-0.025,0.342-0.1   c3.823-3.234,7.812-6.282,11.154-10.053c4.069-4.591,7.623-9.561,10.846-14.769c4.476-7.236,8.374-14.777,11.681-22.618   c1.546-3.666,2.678-7.468,3.519-11.361c1.862-8.623,2.448-17.37,2.47-26.162c0.021-8.604-0.104-17.209-0.105-25.814   c-0.002-5.149,0.052-10.299,0.186-15.446c0.142-5.423,0.403-10.843,1.086-16.232c0.455-3.594,1.313-7.061,3.293-10.161   c1.069-1.675,2.321-3.178,4.001-4.287c2.794-1.844,5.745-1.663,8.131,0.66c0.98,0.954,1.8,2.093,2.588,3.22   c2.525,3.612,5.274,7.015,8.732,9.791c2.035,1.635,4.227,2.994,6.746,3.758c3.475,1.054,6.774,0.672,9.58-1.682   c3.632-3.048,6.974-6.408,9.658-10.355c1.191-1.751,2.123-3.625,2.603-5.715c0.738-3.213,0.014-6.122-1.871-8.729   c-0.925-1.278-1.994-2.49-3.167-3.543c-6.689-6.005-13.601-11.742-20.954-16.926c-0.529-0.374-1.117-0.695-1.722-0.922   c-0.816-0.306-1.394,0.088-1.371,0.966c0.02,0.75,0.163,1.514,0.365,2.24c1.725,6.219,3.506,12.423,5.205,18.65   c0.818,2.996,1.516,6.026,2.221,9.051c0.174,0.75,0.382,1.528,0.231,2.325c-0.551,0.087-0.59-0.356-0.725-0.627   c-2.319-4.669-4.708-9.305-6.914-14.027c-3.594-7.693-7.089-15.433-10.585-23.172c-3.211-7.109-6.368-14.243-9.547-21.367   c-0.135-0.303-0.243-0.617-0.453-1.153c0.744,0.189,1.268,0.287,1.768,0.456c9.087,3.06,17.597,7.279,25.489,12.732   c5.106,3.528,9.824,7.513,14.046,12.069c5.979,6.451,10.703,13.709,13.93,21.907c2.688,6.826,4.275,13.876,3.76,21.253   c-0.62,8.886-3.94,16.532-10.826,22.411c-2.911,2.484-6.218,4.253-9.986,5.013c-3.049,0.616-6,0.371-8.874-1.05   c-4.197-2.074-7.496-5.149-10.349-8.767c-1.197-1.518-2.315-3.099-3.452-4.663c-0.659-0.906-1.418-1.699-2.387-2.269   c-1.648-0.97-3.307-0.831-4.627,0.557c-0.749,0.788-1.37,1.734-1.898,2.692c-1.112,2.016-1.667,4.231-2.055,6.488   c-0.852,4.949-1.153,9.949-1.354,14.957c-0.424,10.539-0.332,21.075,0.104,31.611c0.054,1.311,0.045,2.629-0.033,3.938   c-0.32,5.38-0.644,10.761-1.034,16.137c-0.252,3.479-0.583,6.955-0.952,10.424c-0.281,2.644-0.637,5.282-1.033,7.911   c-0.411,2.731-0.867,5.456-1.38,8.17c-0.916,4.84-2.249,9.54-4.808,13.816c-1.153,1.926-2.255,3.883-3.372,5.83   c-2.444,4.261-5.7,7.786-9.628,10.72c-4.439,3.315-9.192,6.13-13.997,8.865c-1.981,1.127-3.986,2.211-5.976,3.32   c-0.292,0.163-0.566,0.357-0.889,0.563c0.125,0.221,0.185,0.383,0.29,0.507c2.221,2.611,4.586,5.075,7.284,7.205   c2.45,1.933,5.238,3.194,8.18,4.141c2.911,0.936,5.879,1.5,8.963,1.363c5.087-0.227,8.839-2.614,11.397-6.957   c0.954-1.618,1.595-3.366,2.018-5.194c0.039-0.168,0.08-0.336,0.136-0.498c0.019-0.056,0.088-0.094,0.245-0.251   c0.153,0.332,0.326,0.611,0.413,0.914c1.337,4.676,1.912,9.411,0.92,14.231c-0.48,2.333-1.405,4.425-3.194,6.14   c-2.65,2.539-5.522,4.694-8.965,6.024c-3.692,1.426-7.49,1.78-11.404,1.197c-5.954-0.888-10.808-3.796-15.005-7.978   c-3.523-3.511-6.424-7.497-9.031-11.71c-0.8-1.292-1.556-2.61-2.337-3.914c-0.395-0.659-0.531-0.706-1.251-0.485   c-5.54,1.702-11.061,3.471-16.627,5.082c-4.774,1.382-9.585,2.641-14.407,3.845c-3.917,0.978-7.864,1.845-11.818,2.666   c-3.243,0.673-6.515,1.214-9.777,1.797c-2.108,0.377-4.222,0.718-6.332,1.085C8.405,270.122,7.948,270.225,7.267,269.912"/>--}}
        {{--<path--}}
        {{--d="M164.485,126.213c0.3,0.234,0.44,0.292,0.498,0.395c0.949,1.718,2.128,3.326,2.636,5.259   c0.245,0.932,0.487,1.881,0.573,2.836c0.342,3.798-0.148,7.52-1.276,11.147c-0.8,2.57-2.368,4.658-4.379,6.426   c-2.894,2.544-6.287,4.213-9.814,5.668c-1.718,0.709-3.456,1.418-5.062,2.341c-3.414,1.964-5.987,4.74-7.498,8.432   c-0.07,0.171-0.236,0.304-0.41,0.519c-0.147-0.195-0.291-0.308-0.329-0.449c-1.236-4.652-2.159-9.353-2.113-14.194   c0.019-1.982,0.287-3.927,1.224-5.716c0.851-1.623,2.124-2.886,3.536-4.013c2.308-1.843,4.887-3.245,7.552-4.482   c2.72-1.263,5.472-2.458,8.214-3.675c2.554-1.134,4.552-2.84,5.697-5.448c0.534-1.219,0.77-2.501,0.86-3.817   C164.417,127.108,164.443,126.775,164.485,126.213"/>--}}
        {{--<path--}}
        {{--d="M62.887,87.207c0.709-0.236,1.415-0.48,2.127-0.705c5.655-1.788,10.968-4.338,16.117-7.25   c1.653-0.934,3.293-1.894,4.916-2.88c5.807-3.527,9.847-8.573,12.626-14.708c1.343-2.966,2.294-6.065,3.189-9.185   c0.114-0.396,0.199-0.809,0.232-1.22c0.067-0.855-0.392-1.263-1.215-1.006c-0.719,0.226-1.429,0.533-2.081,0.909   c-1.136,0.655-2.222,1.395-3.334,2.092c-1.141,0.714-2.269,1.453-3.436,2.122c-2.368,1.355-3.801,3.364-4.295,6.032   c-0.194,1.044-0.292,2.105-0.439,3.199c-0.714,0.06-1.194-0.311-1.543-0.831c-0.225-0.336-0.378-0.74-0.475-1.135   c-0.13-0.535-0.233-1.089-0.246-1.638c-0.081-3.59-0.183-7.181-0.179-10.772c0.003-2.481,1.126-4.372,3.183-5.839   c2.298-1.641,4.813-2.837,7.341-4.029c1.622-0.764,3.268-1.48,4.909-2.204c0.248-0.11,0.526-0.173,0.797-0.212   c1.915-0.275,2.957,0.488,3.282,2.398c0.331,1.939,0.715,3.872,0.97,5.821c0.597,4.555,0.408,9.096-0.344,13.626   c-0.499,3.01-1.265,5.929-2.464,8.746c-2.046,4.806-5.441,8.34-9.958,10.868c-3.635,2.034-7.464,3.584-11.517,4.546   c-3.863,0.917-7.732,1.808-11.611,2.648c-1.753,0.38-3.537,0.622-5.311,0.901c-0.387,0.06-0.791,0.008-1.187,0.008   C62.923,87.409,62.905,87.308,62.887,87.207"/>--}}
        {{--<path--}}
        {{--d="M82.254,175.828c0.205-1.244,0.375-2.293,0.552-3.341c0.531-3.137,1.212-6.236,2.447-9.182   c0.359-0.855,0.767-1.712,1.291-2.472c1.533-2.221,3.776-3.147,6.374-2.883c2.636,0.267,5.153,2.337,4.526,6.336   c-0.226,1.437-0.653,2.826-1.417,4.086c-0.178,0.294-0.365,0.589-0.589,0.849c-0.868,1.008-1.338,1.002-2.263,0.024   c-0.26-0.275-0.525-0.555-0.83-0.775c-0.798-0.577-1.445-0.488-2.074,0.28c-0.216,0.265-0.402,0.567-0.54,0.879   c-1.661,3.757-3.318,7.524-4.262,11.537c-0.688,2.922-1.213,5.883-1.792,8.83c-0.266,1.355-0.419,2.736-0.76,4.071   c-0.2,0.783-0.578,1.561-1.039,2.229c-0.663,0.963-1.412,0.834-1.757-0.299c-0.249-0.817-0.346-1.691-0.422-2.548   c-0.18-2.029-0.243-4.071-0.47-6.095c-0.397-3.534-0.803-7.072-1.358-10.584c-0.437-2.762-1.152-5.473-2.375-8.018   c-0.636-1.326-1.533-2.373-2.986-2.841c-1.252-0.403-2.384-0.024-2.992,1.147c-0.378,0.726-0.568,1.549-0.858,2.323   c-0.277,0.741-0.513,1.508-0.881,2.203c-0.381,0.717-0.972,0.812-1.508,0.192c-0.694-0.802-1.33-1.68-1.842-2.607   c-0.978-1.772-1.595-3.664-1.542-5.733c0.028-1.115,0.343-2.11,1.052-2.966c1.678-2.024,3.757-3.463,6.319-4.108   c1.771-0.445,3.342-0.068,4.603,1.363c1.294,1.468,2.247,3.149,3.08,4.895c1.823,3.82,3.141,7.809,3.821,11.997   c0.045,0.271,0.118,0.54,0.196,0.804C81.984,175.509,82.07,175.579,82.254,175.828"/>--}}
        {{--<path--}}
        {{--d="M123.262,214.475c0.411,0.178,0.733,0.287,1.024,0.449c5.795,3.225,10.365,7.646,13.259,13.677   c1.664,3.467,2.519,7.143,2.67,10.984c0.14,3.546-0.296,7.028-1.195,10.454c-0.094,0.358-0.244,0.726-0.459,1.023   c-0.36,0.499-0.929,0.441-1.102-0.146c-0.161-0.547-0.166-1.152-0.168-1.731c-0.006-1.932,0.171-3.877,0.004-5.793   c-0.466-5.338-2.119-10.248-5.654-14.402c-1.24-1.458-2.667-2.702-4.294-3.707c-0.616-0.381-1.08-0.86-1.302-1.544   c-0.948-2.917-1.885-5.838-2.82-8.759C123.197,214.892,123.237,214.782,123.262,214.475"/>--}}
        {{--</g>--}}
        {{--</svg>--}}
        <span></span>
    </div>
</div>
<header>
    <div class="bePartner">
        <div class="site-width">
            <span class="close-icon"> <figure><img src="{{asset('theme/standard/images/close-icon.png')}}"
                                                   alt="close "> </figure></span>
            <h3> خدمه شبكة انش بي فاست</h3>
            <br>
            <p><p>تقدم شركة اتش بي فاست للعملاء مجموعة سريعة وآمنة وفعالة من حيث تكلفة الخدمات وتحويل الأموال. ووجود الشركاء المناسبين أمر بالغ الأهمية لتقديم خدمة تحويل الأموال بكفاءة. إذا كنت ترغب في أن تصبح جزء من شبكة وكلائنا المتنامية &nbsp;فما عليك إلا</p><ul><li>توفير ترخيص&nbsp;البنك المركزي مجدد</li><li>السجل التجاري&nbsp;</li><li>البطاقة الشخصية</li><li>ثم التوقيع على العقد&nbsp;</li></ul><p>&nbsp;للإستفسار أكثر يرجى التواصل على الرقم المجاني 770027440 <br />أو&nbsp;الرقم المباشر <a href="tel:01815815">01815815</a>&nbsp;</p>
            </p>
        </div>
    </div>
    <div class="site-width">

        <nav class="navbar navbar-expand-lg navbar-dark indigo">
            <a class="navbar-brand" href="{{URL::to('/home')}}">


                <img src="{{asset('theme/standard/images/logo.png')}}" alt=""/> </a>
            <div>



                {{--<a class="lang mobile" href="#">English</a>--}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">  </span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item"><a href="{{URL::to('/services')}}"  target="_self" class="nav-link">خدماتنا</a></li>
                    <li class="nav-item"><a href="{{URL::to('/about')}}"  target="_self" class="nav-link"> نبذة عنا </a></li>
                    <li class="nav-item"><a href="{{URL::to('/locations')}}"  target="_self" class="nav-link">فروعنا</a></li>
                    <li class="nav-item"><a href="{{URL::to('agent')}}"  target="_self" class="nav-link">نقاط الخدمة</a></li>
                    <li class="nav-item"><a href="{{URL::to('news') }}"  target="_self" class="nav-link">الأخبار والعروض</a></li>
                    <li class="nav-item"><a href="{{URL::to('contact') }}"  target="_self" class="nav-link">تواصل معنا </a></li>
                    <li class="nav-item"><a href="{{URL::to('jobs') }}"  target="_self" class="nav-link">الوظائف</a></li>
                </ul>

                <!--  <span class=" ml-2 mr-2"><a href="/careers"
                                              class=" white-text btn btn-secondary">الوظائف</a></span> -->


                <span class=" ml-2 mr-2"><a href="{{URL::to('/services')}}"
                                            class=" white-text_1 btn1 btn-secondary1"><img src=" {{asset('theme/standard/images/mal_logo.png')}}" alt="" class="malimg" /></a></span>

                <span><a href="#"
                         class=" white-text btn btn-primary bePartnerLink">انظم معنا</a></span>
                {{--<span class="icon-search"></span>--}}
                {{--<a class="lang" href="en/index.html">English</a>--}}
            </div>
        </nav>
    </div>
</header>
<div class="woodmart-social-icons text-center icons-design-colored icons-size-custom color-scheme-dark social-follow social-form-square woodmart-sticky-social woodmart-sticky-social-left buttons-loaded"> <a rel="nofollow" href="https://api.whatsapp.com/send?phone=00967776660524" target="_blank" class="whatsapp-desktop  woodmart-social-icon social-whatsapp"> <i class="fa fa-whatsapp"></i> <span class="woodmart-social-icon-name">WhatsApp</span> </a> <a rel="nofollow" href="https://api.whatsapp.com/send?phone=00967776660524" target="_blank" class="whatsapp-mobile  woodmart-social-icon social-whatsapp"> <i class="fa fa-whatsapp"></i> <span class="woodmart-social-icon-name">WhatsApp</span> </a></div>
{{--<div id="searchbox">--}}
{{--<form method="POST" action="#" accept-charset="UTF-8" class="clearfix"><input name="_token" type="hidden" value="Tknzt7R1nYNHLeMwkic0XAOezF9YJkyX9YrspE95">--}}

{{--<input id="search-input" type="text" name="search" placeholder="بحث..."/>--}}
{{--</form>--}}
{{--</div>--}}

@yield('content')



<footer class="footer-bs">
    <div class="site-width">
        <div class="row">

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 "><h4> نبذة عنا </h4>
                        <ul class="navbar-nav"><li class="nav-item active"><a class='nav-link' href="{{URL::to('/news')}}"  target="_self">الأخبار </a></li> </ul>
                        <ul class="navbar-nav"><li class="nav-item active"><a class='nav-link' href="{{URL::to('/locations')}}"  target="_self">فروعنا</a></li> </ul>
                        <ul class="navbar-nav"><li class="nav-item active"><a class='nav-link' href="{{URL::to('/jobs')}}"  target="_self">الوظائف</a></li> </ul>
                        <ul class="navbar-nav"><li class="nav-item active"><a class='nav-link' href="{{URL::to('/help')}}"  target="_self">مركز الدعم</a></li> </ul>
                    </div>
                    <div class="col-md-4 "><h4>المساعدة والتواصل </h4>

                        <ul class="navbar-nav"><li class="nav-item active"><a class='nav-link' href="{{ URL::to('/contact') }}"  target="_self">اتصل بنا</a></li> </ul>
                        <ul class="navbar-nav"><li class="nav-item active"><a class='nav-link' href="{{URL::to('/help')}}"  target="_self">مركز المساعدة</a></li> </ul>
                        <ul class="navbar-nav"><li class="nav-item active"><a class='nav-link' href="{{URL::to('/fag')}}"  target="_self">الاسئلة الشائعة</a></li> </ul>
                        <ul class="navbar-nav"><li class="nav-item active"><a class='nav-link' href="{{URL::to('/policy')}}"  target="_self">الامتثال</a></li> </ul>
                    </div>
                    <div class="col-md-4 "><h4>خدماتنا</h4><ul class="navbar-nav"><li class="nav-item active"><a class='nav-link' href="{{URL::to('/services')}}"  target="_self">اتش بي فاست موبايل</a></li> </ul>
                        <ul class="navbar-nav"><li class="nav-item active"><a class='nav-link' href="{{URL::to('/services')}}"  target="_self">شبكه اتش بي فاست للحولات المالية</a></li> </ul>
                        <ul class="navbar-nav"><li class="nav-item active"><a class='nav-link' href="{{URL::to('/services')}}"  target="_self"></a></li> </ul>
                        <ul class="navbar-nav"><li class="nav-item active"><a class='nav-link' href="{{URL::to('/services')}}"  target="_self"></a></li> </ul> </div>
                </div>
                <div class="apps">
                    <div>
                        <div class="vc_column-inner vc_custom_1578064366918">
                            <div class="wpb_wrapper">
                                <div class="info-box-wrapper ">
                                    <div id="wd-5e51f1f90bba7"
                                         class="cursor-pointer woodmart-info-box text-center box-icon-align-top box-style-bg-hover color-scheme- woodmart-bg-none wpb_animate_when_almost_visible wpb_wd-zoom-in wd-zoom-in box-title-small hover-color-scheme-light vc_custom_1582428678321 wpb_start_animation animated"
                                         onclick="window.open(&quot;tel:+967770027440&quot;,&quot;_blank&quot;)">
                                        <div class="box-icon-wrapper  box-with-icon box-icon-simple">
                                            <div class="info-box-icon"><img class="info-icon image-1 lazyloaded"

                                                                            data-lazy-src="https://sofratravel.com/visa/wp-content/uploads/sites/7/2019/12/72.png"
                                                                            data-was-processed="true">
                                                <noscript><img class="info-icon image-1 "
                                                               src="https://sofratravel.com/visa/wp-content/uploads/sites/7/2019/12/72.png"
                                                               width="72" height="72" alt="72" title="72"/></noscript>
                                            </div>
                                        </div>
                                        <div class="info-box-content"><h4
                                                class="info-box-title woodmart-font-weight- box-title-style-default">
                                                اتصال مباشر</h4>
                                            <div class="info-box-inner reset-mb-10"></div>
                                        </div>
                                        <style></style>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row" style=" max-width: 350px;  margin: 20px auto;   text-align: center;">

                        <div class="col-12 pb-2">بإمكانك تحميل تطبيق اتش بي فاست من</div>
                        <div class="col-6"><a href="#" target="#"><img src=" {{ asset('theme/standard/images/google-play-badge_en.png') }} " alt=""/> </a> </div>
                        <div class="col-6"><a href="#"><img src=" {{asset('theme/standard/images/apple-store-badge_en68b3.png ')}} " alt=""/> </a> </div>
                    </div>
                    <hr>
                </div>
            </div>

        </div>

        <div class="row  text-center">
            <div class="col-md-12 ">
                <ul class="social-icons">
                    <li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" target="_blank" class="social-icon"> <i  class="fa fa-twitter"></i></a></li>
                    <li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-youtube"></i></a></li>
                    <li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-telegram"></i></a></li>
                    <li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-instagram"></i></a></li>
                    <li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-whatsapp"></i></a></li>

                    <div class="woodmart-social-icons text-center icons-design-colored icons-size-custom color-scheme-dark social-follow social-form-square woodmart-sticky-social woodmart-sticky-social-left buttons-loaded"  style="         background-color: #40c095;"> <a rel="nofollow" href="https://api.whatsapp.com/send?phone=00967776660524" target="_blank" class="whatsapp-desktop  woodmart-social-icon social-whatsapp" style="background-color: rgba(246, 244, 250, 0);"> <li class="fa fa-whatsapp"  ></li> <span class="woodmart-social-icon-name"  ></span> </a> </div>
                </ul>

            </div>

            <div class="col-md-12 copyright">
                <p><a href="#" target="_blank">تصميم وتطوير شركه انجاز سوفت لتقنيه المعلومات</a></p>
                <p><span class="num">2021-</span>  اتش بي فاست
                    <a href="" class="sitemap"></a></p>

            </div>
        </div>
    </div>

</footer>


<!-- Your customer chat code -->
<div class="fb-customerchat"  attribution="setup_tool"   page_id="232635590556532"  theme_color="#0058a9"logged_in_greeting="مرحبا ، أرسل لللإستفسار وسنجيبك في أقرب وقت"

     logged_out_greeting="مرحبا ، أرسل لللإستفسار وسنجيبك في أقرب وقت">
</div>


<script src="{{asset('js/jquery-1.10.1.min.js') }}" type="text/javascript"></script>
<script src="{{asset('js/jquery.easing.1.3.js') }}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap1.min.js') }}" type="text/javascript"></script>
<script src="{{asset('js/slick.min.js') }}" type="text/javascript"></script>
{{--<script src="https://maps.googleapis.com/maps/api/js?libraries=places&amp;key=AIzaSyB8WHGB9JtfpSt9b9BxBojydfVPd80dKxg&amp;callback=load_map_info"></script>--}}

{{--<script type="text/javascript" src="js/map/infobox.js"></script>--}}
{{--<script type="text/javascript" src="js/map/map_ar.js"></script>--}}
<script src="{{asset('js/form.js') }}" type="text/javascript"></script>
<script src="{{asset('js/script.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.mainSliders').slick({
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            dots: true,

        });
        $('.currencySliders').slick({
            // autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            infinite: true,
            speed: 500,
            dots: false,
        });
        $('.newsContainer .row').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 515,
                    settings: {
                        slidesToShow: 1,
                        dots: true,
                        arrows: true,
                    }
                },
            ],
        });
        //
        // $('.partnersSliders').slick({
        //     slidesToShow: 4,
        //     slidesToScroll: 3,
        //     infinite: false,
        //
        // });
        var $parent = $(".partnersSliders"),
            $items = $parent.find(".img-container"),
            $loadMoreBtn = $("#load-more-partners"),
            maxItems = 4,
            hiddenClass = "visually-hidden";

        if ($items.length < maxItems + 1) {
            $loadMoreBtn.hide()
        }
        // add visually hidden class to items beyond maxItems
        $.each($items, function (idx, item) {
            if (idx > maxItems - 1) {
                $(this).addClass(hiddenClass);
            }
        });

//            $("img").lazyload({
//            effect : "fadeIn"
//        });

        // onclick of show more button show more = maxItems
        // if there are none left to show kill show more button
        $loadMoreBtn.on("click", function (e) {
            $("." + hiddenClass).each(function (idx, item) {
                if (idx < maxItems) {
                    $(this).removeClass(hiddenClass);
                }
                // kill button if no more to show
                if ($("." + hiddenClass).size() === 0) {
                    $loadMoreBtn.hide();
                }
            });
            return false;
        });

    });
</script>
// <script>
    //     window.fbAsyncInit = function () {
    //         FB.init({
    //             xfbml            : true,
    //             version          : 'v9.0'
    //         });
    //     };

    //     (function (d, s, id) {
    //         var js, fjs = d.getElementsByTagName(s)[0];
    //         if (d.getElementById(id)) return;
    //         js = d.createElement(s);
    //         js.id = id;
    //         js.src = '{{asset('connect.facebook.net/ar_AR/sdk/xfbml.customerchat.js') }}';
    //         fjs.parentNode.insertBefore(js, fjs);
    //     }(document, 'script', 'facebook-jssdk'));</script>




<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108753766-4"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-108753766-4');
</script>

</body>

</html>
