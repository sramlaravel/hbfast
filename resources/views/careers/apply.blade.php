@extends('layouts.master')
@section('content')



<section class="section-padding">
    <div class="container">
        <div class="d-flex justify-content-center mt-3"  style="background-color: #2e4066;padding-bottom: 50px;  padding-top: 20px ;margin-top:0rem!important ">
            <h3 class="text-center alt-color mb-4 mt-2" style="color: #eeeae9;">
                الوظائف الشاغرة                </h3>
        </div>
        <div class="row mt-5 pt-3">
            <div class="col-md-6">
                <div class="story_banner">
                    <img src="{{asset('images/banner/about_banner.png')}} " alt="صورة التوظيف" class="img-fluid">
                </div>
              </div>
            @include('admin.includes.alerts.success')
            @include('admin.includes.alerts.errors')
             <div class="col-md-6 mt-5 mt-md-0  wow slideInLeft">
                 <h3 class="text-center alt-color mb-4 mt-2">
                    نسعد بأن تكون من عالئنتا               </h3>

                <!-- Contact Form -->
                 @foreach($newsDetail as $n)
                <form id="contact_form" name="contact_form" class="" action="{{route('fileUpload',['id' =>$n->id])}}" method="post" enctype='multipart/form-data'>
                    @endforeach
                    @csrf
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input name="name" class="form-control" type="text" placeholder="اسم المتقدم"   value="{{Request::old('name')}}"  required="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input name="age" class="form-control form__field phone  num required"type="text"  placeholder="العمر"  value="{{Request::old('age')}}"  required="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input name="degree" class="form-control" type="text" placeholder="المؤهل" value="{{Request::old('degree')}}"   required="">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input name="email" class="form-control" type="email" placeholder="البريد الإلكتروني" value="{{Request::old('email')}}"  >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">


                            <input name="phone"   type="text"  placeholder="التلفون" value="{{Request::old('phone')}}" class="form-control  form__field phone  num required" >
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input name="address" class="form-control" type="text" placeholder="عنوان السكن"  value="{{Request::old('address')}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                 <textarea name="skills" class="form-control" rows="3" type="text"  placeholder="الكفاءات والخبرات"  value="{{Request::old('skills')}}" aria-required="true"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 row">
                            <div class="col-sm-4"><label class="col-form-label">السيرة الذاتية</label></div>
                            <div class="form-group col-sm-8">
                                <input class="form-control" id="CvUpload" name="cv" type="file" value="{{Request::old('cv')}}" accept="application/pdf">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group clearfix">
                                <div class="form-group clearfix">
                                    <button type="submit" name="SendEmployment"
                                            class="btn alt-btn w-100 form-control">ارسال
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
    @stop
