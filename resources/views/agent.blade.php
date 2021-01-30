@extends('layouts.master')

@section('content')


    <link href="theme/standard/mdb.rtl.css" rel="stylesheet" type="text/css"/>
    <style>
        .container-fluid {
            max-width: 960px;
        }

        [data-toggle="collapse"] {
            cursor: pointer;
        }

        table {
            width: 100%;
        }

        .table-responsive th, .table-responsive td {
            background-color: rgba(35, 21, 255, 0.11);
            border-top: 4px solid #ffffff;
            color: #525f7f;
            font-size: 15px;

        }

        .valign-middle {
            vertical-align: middle !important;
        }

        @media  screen and (max-width: 767px) {
            .table-responsive thead,
            .table-responsive tbody,
            .table-responsive tfoot,
            .table-responsive tr,
            .table-responsive th, .table-responsive td {
                display: block;
            }

            .table-responsive thead {
                display: none;
            }

            .table-responsive .align-center,
            .table-responsive .align-right {
                text-align: inherit;
            }

            .table-responsive tr {
                border-top: 1px solid #f6f4fa;
                border-bottom: 15px solid rgba(246, 244, 250, 0.4);
            }

            .table-responsive tr:first-child {
                border: 0;
            }

            .table-responsive > tbody > tr > td {
                padding-left: 50%;
                border-top-color: rgba(55, 45, 250, 0.45);
            }

            .table-responsive > tbody > tr > td:first-child {
                border: 0;
            }

            .table-responsive [data-label] {
                position: relative;
            }

            .table-responsive [data-label]:before {
                position: absolute;
                top: 0;
                left: 0;
                padding: 8px;
                content: attr(data-label);
                font-weight: bold;
            }

            .navbar-fixed-top.visible-xs + .row {
                padding-top: 60px;
            }

            .btn .visible-xs {
                display: inline-block !important;
            }

            .sliding-sidebar {
                position: absolute;
                z-index: 1;
                background: #fff;
                min-height: 100%;
                border-right: 1px solid #ccc;
            }

            .sliding-sidebar.collapse, .sliding-sidebar.collapsing {
                display: block !important;
                -webkit-transform: translate3D(-100%, 0, 0);
                transform: translate3D(-100%, 0, 0);
                transition: all 200ms;
            }

            .sliding-sidebar.collapse.in {
                -webkit-transform: translate3D(0, 0, 0);
                transform: translate3D(0, 0, 0);
                box-shadow: 1px 0 0 rgba(0, 0, 0, 0.05), 2px 0 0 rgba(0, 0, 0, 0.05), 3px 0 0 rgba(0, 0, 0, 0.05);
            }
        }

        .parent-collapsed {
            display: none;
        }

        .collapsed .parent-expanded {
            display: none;
        }

        .collapsed .parent-collapsed {
            display: inline-block;
        }

        .agentsPage {
            padding: 50px 0;

        }

        .filterFrom .btn {
            padding: 6px 20px;
            margin-bottom: 0 !important;
            min-width: auto;
        }

        .filterContent i {
            font-size: 14px;
            color: #8d8d8d;
            padding: 0 10px;
        }

        .table-responsive {
            display: table;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <section class="agentsPage">
    <div class="mb-4">
        <div class="container">
            <div class="row filterContent">
                <div class="col-md-6" style="margin-top: 21px;">
                    <form class="">
                        <label class="d-block w-100" for="inlineFormInputName2"> <i class="fa fa-search"></i> بحث عن
                            وكيل</label>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control mb-2 mr-sm-2 w-100" id="agent_search">
                            </div>
                        </div>
                    </form>



                </div>

                <div class="col-md-6">
                    0<form class="form- filterFrom">
                        <label class=" w-100"> <i class="fa fa-tasks"></i>فرز بحسب الدولة والمدينة</label>
                        <div class="row">
                            <div class="col-md-6 mb-3">


                                {{--{!! Form::open(['method'=>'create','route'=>['agent.create',$country->id ]]) !!}--}}

                                {{--{!! Form::Label('country', 'اختر الدولة ...') !!}--}}
                                {{--{!! Form::select('country',$country,$country->id , ['class' => 'custom-select mr-sm-2 d-block']) !!}--}}

                                    {{--{!! form ::close() !!}--}}

                                <select class="custom-select mr-sm-2 d-block" id="country"  name="country" onchange="">

                                    <option selected  value="all">اختر الدولة ...</option>
                                    @foreach($countries  as $country=>$key )
                                            <option value="{{$country}}">{{ $key }}</option>
                                    @endforeach
                                    {{--<option value="2">الامارات</option>--}}
                                    {{--<option value="3">البحرين</option>--}}
                                    {{--<option value="4">الكويت</option>--}}
                                    {{--<option value="5">اليمن</option>--}}
                                    {{--<option value="6">بريطانيا</option>--}}
                                    {{--<option value="7">عمان</option>--}}
                                    {{--<option value="8">قطر</option>--}}
                                    {{--<option value="9">لبنان</option>--}}

                                </select>
                            </div>
                            {{--URL::to('agent/getstates',$country)--}}
                            <div class="col-md-6">
                                <select class="custom-select mr-sm-2 ml-2" id="city" name="city">
                                    <option>--المدينه--</option>

                                </select>
                            </div>
                        </div>


                    </form>
                </div>

            </div>

        </div>
    </div>

    <div class="container">


        <!-- filter sidebar -->


        <!-- table container -->
        <div class="tableCont w-100">
            <div id="sram">
                <table class="table table-striped table-hover table-responsive">
                <thead>
                <tr>
                    <th>الدولة</th>
                    <th>المدينة</th>
                    <th>الوكيل</th>
                    <th>الفرع</th>

                    <th>التلفون</th>
                    <th>فاكس</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($all as $on)
                    <tr>
                        <td class="valign-middle" data-label="الدولة">
                            {{$on->name_ar}}
                        </td>
                        <td class="valign-middle" data-label="المدينة">
                            {{$on->city_name}}
                        </td>
                        <td class="valign-middle" data-label="الوكيل">
                            {{$on->name_point}}
                        </td>
                        <td class="valign-middle " data-label="الفرع">
                            {{$on->desc_ar}}
                        </td>
                        <td class="num " data-label="التلفون">
                            {{$on->phone}}
                        </td>
                        <td class="num " data-label="فاكس">
                            {{$on->fax}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
               </table>

            </div>
            <div>

                <div aria-label="Page navigation example">
                    <ul class="pagination">

                        <li class="disabled"><span>{!! $all->links() !!}</span></li>




                    

                    </ul>

                </div>

            </div>
        </div>

              </div>
    </section>

    <script src="js/jquery-1.10.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ()
            {
                jQuery('select[name="country"]').on('change',function(){
                    var countryID = jQuery(this).val();
                    if(countryID)
                    {


                        jQuery.ajax({
                            url: "{{ url('/agent/getstates/')}}/"+countryID,
                                type : "GET",
                            dataType: "json",
                            success:function(data)
                            {
                                console.log(data);
                                jQuery('select[name="city"]').empty();
                                jQuery  .each(data, function(key,value){
                                     jQuery('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');

                                });
                            }
                        });


                    }
                    else
                    {
                        jQuery('select[name="city"]').empty();
                    }

                });
            });
        </script>
    <script type="text/javascript">
    $(document).ready(function () {
        var cities = [];
        var i;
        $('select[name="city"]').on('change', function () {
            var cityID = $(this).val();
            if (cityID) {
                $.ajax({
                    url: "{{ url('/agent/gettable/')}}/" + cityID,
                    type: "GET",
                    dataType: "json",
                    success: function (msg) {
                        for ( i = 0; i < msg.length; i++) {
                            var obj = [];
                            console.log(msg[i]);
                            obj[0] = msg[i]['name_ar'] ;
                            obj[1] = msg[i]['city_name'];
                            obj[2] = msg[i]['name_point'];
                            obj[3] = msg[i]['branch_name'];
                            obj[4] = msg[i]['desc_ar'];
                            obj[5] = msg[i]['phone'];
                            obj[6] = msg[i]['fax'];



                            cities.push(obj);

                        }
                        //console.log(locations);
                        $(this).addClass("done");

                        var table_content = "";
                        for (i = 0; i < cities.length; i++) {
                            table_content += '<tr>';
                            table_content += '<td class="valign-middle" data-label="الدولة" >';
                            table_content += cities[i][0];
                            table_content += "</td>";
                            table_content += '<td class="valign-middle"data-label="المدينه" >';
                            table_content += cities[i][1];
                            table_content += "</td>";
                            table_content += '<td class="valign-middle"data-label="الوكيل" >';
                            table_content += cities[i][2];
                            table_content += "</td>";
                            table_content += '<td class="valign-middle" data-label="الفرع" >';
                            table_content += cities[i][4];
                            table_content += "</td>";
                            table_content +='<td class="num" data-label="التلفون" >';
                            table_content += cities[i][5];
                            table_content += "</td>";
                            table_content +='<td class="num" data-label="الفاكس" >';
                            table_content += cities[i][6];
                            table_content += "</td>";
                            table_content += "</tr>";
                        }

                        $('#sram table tbody').html(table_content);


                        function clearOverlays() {
                            $('#sram table tbody').empty();

                            cities.length = 0;
                        }




//

                            $('#country').change(function () {
                                clearOverlays();

//                                $('#sram table tbody').html(table_content);
                        })



//                            $('#city').change(function () {
//
//
//                        })





                        $('#city').change(change_city)
                        function change_city() {
                            clearOverlays();

//                            $('#sram table tbody').html(table_content);

                            if ($(this).val()) {

                                $('#sram p strong').text($('option:selected', this).text())

                            }
                        }
                    }
                });
            }

        })
    });




</script>
    <script type="text/javascript">
        $(document).ready(function () {
            var search_text,i;
            var cities=[];
            function clearOverlays() {
                $('#sram table tbody').empty();

                cities.length = 0;
            }
            $('#agent_search').keyup(function () {
               search_text = $(this).val();

                if ($(this).val() != "") {
                    clearOverlays();
                    $.ajax({
                        url: "{{ url('/agent/agent_search/')}}/" + search_text,
                        type: "GET",
                        dataType: "json",
                        success: function  (data) {
                            for ( i = 0; i < data.length; i++) {
                                var obj = [];
                                console.log(data[i]);
                                obj[0] = data[i]['name_ar'] ;
                                obj[1] = data[i]['city_name'];
                                obj[2] = data[i]['name_point'];
                                obj[3] = data[i]['branch_name'];
                                obj[4] = data[i]['desc_ar'];
                                obj[5] = data[i]['phone'];
                                obj[6] = data[i]['fax'];



                                cities.push(obj);

                            }
                            //console.log(locations);
                            $(this).addClass("done");

                            var table_content = "";
                            for (i = 0; i < cities.length; i++) {
                                table_content += '<tr>';
                                table_content += '<td class="valign-middle" data-label="الدولة" >';
                                table_content += cities[i][0];
                                table_content += "</td>";
                                table_content += '<td class="valign-middle"data-label="المدينه" >';
                                table_content += cities[i][1];
                                table_content += "</td>";
                                table_content += '<td class="valign-middle"data-label="الوكيل" >';
                                table_content += cities[i][2];
                                table_content += "</td>";
                                table_content += '<td class="valign-middle" data-label="الفرع" >';
                                table_content += cities[i][4];
                                table_content += "</td>";
                                table_content +='<td class="num" data-label="التلفون" >';
                                table_content += cities[i][5];
                                table_content += "</td>";
                                table_content +='<td class="num" data-label="الفاكس" >';
                                table_content += cities[i][6];
                                table_content += "</td>";
                                table_content += "</tr>";
                            }

                            $('#sram table tbody').html(table_content);


                        }});


                } else {

                    $('select[name="city"]')
                        var cityID = $(this).val();
                        if ($(this).val() ) {
                            $.ajax({
                                url: "{{ url('/agent/gettable/')}}/" + cityID,
                                type: "GET",
                                dataType: "json",
                                success: function (msg) {
                                    for ( i = 0; i < msg.length; i++) {
                                        var obj = [];
                                        console.log(msg[i]);
                                        obj[0] = msg[i]['name_ar'] ;
                                        obj[1] = msg[i]['city_name'];
                                        obj[2] = msg[i]['name_point'];
                                        obj[3] = msg[i]['branch_name'];
                                        obj[4] = msg[i]['desc_ar'];
                                        obj[5] = msg[i]['phone'];
                                        obj[6] = msg[i]['fax'];



                                        cities.push(obj);

                                    }
                                    //console.log(locations);
                                    $(this).addClass("done");

                                    var table_content = "";
                                    for (i = 0; i < cities.length; i++) {
                                        table_content += '<tr>';
                                        table_content += '<td class="valign-middle" data-label="الدولة" >';
                                        table_content += cities[i][0];
                                        table_content += "</td>";
                                        table_content += '<td class="valign-middle"data-label="المدينه" >';
                                        table_content += cities[i][1];
                                        table_content += "</td>";
                                        table_content += '<td class="valign-middle"data-label="الوكيل" >';
                                        table_content += cities[i][2];
                                        table_content += "</td>";
                                        table_content += '<td class="valign-middle" data-label="الفرع" >';
                                        table_content += cities[i][4];
                                        table_content += "</td>";
                                        table_content +='<td class="num" data-label="التلفون" >';
                                        table_content += cities[i][5];
                                        table_content += "</td>";
                                        table_content +='<td class="num" data-label="الفاكس" >';
                                        table_content += cities[i][6];
                                        table_content += "</td>";
                                        table_content += "</tr>";
                                    }

                                    $('#sram table tbody').html(table_content);


                                    function clearOverlays() {
                                        $('#sram table tbody').empty();

                                        cities.length = 0;
                                    }




//

                                    $('#country').change(function () {
                                        clearOverlays();

//                                $('#sram table tbody').html(table_content);
                                    })



//                            $('#city').change(function () {
//
//
//                        })





                                    $('#city').change(change_city)
                                    function change_city() {
                                        clearOverlays();

//                            $('#sram table tbody').html(table_content);

                                        if ($(this).val()) {

                                            $('#sram p strong').text($('option:selected', this).text())

                                        }
                                    }
                                }
                            });
                        }
                        else {
                            clearOverlays();
                            $.ajax({
                                url: "{{ url('/agent/index')}}/",
                                type: "GET",
                                dataType: "json",
                                success: function (data) {
                                    for (i = 0; i < data.length; i++) {
                                        var obj = [];
                                        console.log(data[i]);
                                        obj[0] = data[i]['name_ar'];
                                        obj[1] = data[i]['city_name'];
                                        obj[2] = data[i]['name_point'];
                                        obj[3] = data[i]['branch_name'];
                                        obj[4] = data[i]['desc_ar'];
                                        obj[5] = data[i]['phone'];
                                        obj[6] = data[i]['fax'];


                                        cities.push(obj);

                                    }
                                    //console.log(locations);
                                    $(this).addClass("done");

                                    var table_content = "";
                                    for (i = 0; i < cities.length; i++) {
                                        table_content += '<tr>';
                                        table_content += '<td class="valign-middle" data-label="الدولة" >';
                                        table_content += cities[i][0];
                                        table_content += "</td>";
                                        table_content += '<td class="valign-middle"data-label="المدينه" >';
                                        table_content += cities[i][1];
                                        table_content += "</td>";
                                        table_content += '<td class="valign-middle"data-label="الوكيل" >';
                                        table_content += cities[i][2];
                                        table_content += "</td>";
                                        table_content += '<td class="valign-middle" data-label="الفرع" >';
                                        table_content += cities[i][4];
                                        table_content += "</td>";
                                        table_content += '<td class="num" data-label="التلفون" >';
                                        table_content += cities[i][5];
                                        table_content += "</td>";
                                        table_content += '<td class="num" data-label="الفاكس" >';
                                        table_content += cities[i][6];
                                        table_content += "</td>";
                                        table_content += "</tr>";
                                    }

                                    $('#sram table tbody').html(table_content);
                                }
                            });
                        }





                }

            });
            });
    </script>

   {{--<script type="text/javascript">--}}

        {{--function change () {--}}

            {{--$('select[name="country"]').on('change',function(){--}}
                {{--var countryID = $(this).val();--}}
                {{--if(countryID)--}}
                {{--{--}}

                    {{--let data =JSON.parse('{!! json_encode(URL::to('agent/getstates/{countryID}')!!}');--}}

                    {{--if (data)--}}
                    {{--{--}}
                        {{--console.log(data);--}}
                        {{--$('select[name="city"]').empty();--}}
                        {{--$.each(data, function(key,value){--}}
                            {{--$('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');--}}
                        {{--});--}}
                    {{--}--}}

                {{--}--}}
                {{--else--}}
                {{--{--}}
                    {{--$('select[name="city"]').empty();--}}
                {{--}--}}
            {{--});--}}
        {{--};--}}
    {{--</script>--}}



@endsection