@extends('layouts.master')

@section('content')
    <section class="news-section blog-grid blog-page section-padding overlay-style-one sec-pad-2">
        <div class="container">
            <div class="d-flex justify-content-center mt-3">
                <h3 class="text-center alt-color mb-4 mt-2">
  اخبارنا                </h3>
            </div>
            <div class="row">
                @if(count($news)>0)
                    @foreach($news as $n)
                <div class="col-lg-4 col-md-6 col-sm-12 news-column">

                    <div class="single-news-content inner-box inner-box-news">
                        <figure class="image-box">

                            <img src="{{ asset($n->news_img)}}" alt="{{$n->news_title }}"
                                 alt="" width="310" height="235">
                            <!--Overlay Box-->
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
                                        <a href="{{url('news/details/'.$n->id) }}"
                                           class="link"><i
                                                class="icon fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </figure>
                        <div class="lower-content">
                            <h4>
                                <a style="height: 100px" href="{{ url('news/details/'.$n->id)}}"> {{$n->news_title }} </a>
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
                @else
                    <h4>No Data Found!!</h4>
                @endif


            </div>
            <ul class="pagination centred clearfix d-flex justify-content-center">

                <li>{{ $news->links() }}   </li>
            </ul>

        </div>
    </section>

@endsection
