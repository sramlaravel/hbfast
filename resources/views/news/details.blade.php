@extends('layouts.master')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('theme/standard/css-reset.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('theme/standard/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('theme/standard/css-reset.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('theme/standard/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('theme/standard/mdb.rtl.css')}}" />


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
    <style>
        p {
            display: block;
        }

        .checkbox {
            display: block;
            margin-bottom: 15px;
        }

        .checkbox input {
            padding: 0;
            height: initial;
            width: initial;
            margin-bottom: 0;
            display: none;
            cursor: pointer;
        }

        .checkbox label {
            position: relative;
            cursor: pointer;
            color: #79000e;

        }

        .checkbox label:before {
            content: '';
            -webkit-appearance: none;
            background-color: transparent;
            border: 2px solid #79000e;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
            padding: 10px;
            display: inline-block;
            position: relative;
            vertical-align: middle;
            cursor: pointer;
            margin-right: 5px;
            margin-left: 5px;
        }

        .checkbox input:checked + label:after {
            content: '';
            display: block;
            position: absolute;
            top: 3px;
            right: 14px;
            width: 6px;
            height: 14px;
            border: solid #79000e;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('theme/standard/style.css')  }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('theme/standard/responsive.css') }}" />

<section class="Page">
    <div class="PageCol site-width">
        <div class=" docs-header">
            <img src="{{ asset($newsDetail[0]->news_img)}}"
                 alt="{{ $newsDetail[0]->news_title }}"/>
            <div class=" docs-header-heading">
                <h1 class="heading_1 mt-5 mb-3">
                    <span>{{ $newsDetail[0]->news_title }}ة</span></h1>
                <p>

                    <span class="num">{{ date('Y-m-d', strtotime ( $newsDetail[0]->created_at)) }}</span>

            </div>
            <div class="page_content">
                <p>&nbsp;</p><div style="direction: rtl;">{{  $newsDetail[0]->news_desc  }}</div>
            </div>
            <br>
        </div>
        <div class="page_content">

            <div class="share">
                <span>مشاركة</span>
                <a href="http://www.facebook.com/sharer.php?u=https://swaidexchange.com/news/fardan" target="_blank"><i class="fa fa-facebook"></i></a>

                <a href="https://twitter.com/intent/tweet?url=https://swaidexchange.com/news/fardan" target="_blank"><i class="fa fa-twitter"></i></a>

                <a href="whatsapp://send?text=https://swaidexchange.com/news/fardan"><i class="fa fa-whatsapp"></i></a>

                <a href="https://plus.google.com/share?url=https://swaidexchange.com/news/fardan" target="_blank"><i class="fa fa-google-plus"></i></a>
            </div>
        </div>

</section>
@endsection




