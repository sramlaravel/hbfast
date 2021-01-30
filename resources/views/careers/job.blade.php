@extends('layouts.master')

@section('content')

<section class="news-section blog-grid blog-page section-padding overlay-style-one sec-pad-2">
    <div class="container">
        <div class="heading text-center site-width featured" style="background-color: #2e4066;padding-bottom: 50px;  padding-top: 20px; ">
            <h2 class="heading_1" style="    color: #FFF;">  الوظائف الشاغرة  </h2>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <h3 class="text-center alt-color mb-4 mt-2"  style="    color: #FFF;">
                     </h3>
        </div>
        <div class="row">
            @if(count($job)>0)

            @foreach($job as $item)
                    <div class="col-md-6 col-sm-12 news-column">
                        <div class="single-news-content inner-box">
                            <figure class="image-box">
                                <img src="{{ asset($item->image)}}"
                                     alt="" width="310" height="350">
                                <!--Overlay Box-->
                                <div class="overlay-box">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <div class="time">
                                                <h5 class="main-color">متطلبات الوظيفة</h5>
                                                <hr>
                                                <ul>
                                                    <li class="requirements_text_color"> {{$item->requirements}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                            <div class="lower-content">
                                <h4 class="m-2">
                                    <a href="{{ url('careers/apply/'.$item->id)}}">{{$item->location}}-{{$item->title}}</a>
                                </h4>
                                <div class="link pull-left">
                                    <a href="{{ url('careers/apply/'.$item->id) }}" class="theme-btn-two">تقديم</a>
                                </div>
                            </div>
                        </div>
                    </div>



                        @endforeach
                    @else
                        <h4>No Data Found!!</h4>
                    @endif
            </div>

        <ul class="pagination centred clearfix d-flex justify-content-center">

            <li>{{ $job->links() }}   </li>
        </ul>


        </div>
    </div>
</section>
 @stop