<?php

namespace App\Http\Controllers;
use App\Models\Banks;
use  App\Sliders;
use App\News;
use App\Partners;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $lid = DB::table('sliders')->get();
        $par=Partners::all();
        $Banks = Banks::all();
//               =DB::table('news')->where(['id'=>in(1)])->get()

        $news = News ::orderBy ('id', 'desc')->take(3)->get();
        $sana = DB ::table('currency_info')-> where('zone', '=', 1) ->whereIn('currency_id',  ['USD', 'SAR'])->get();
        $aden = DB::table('currency_info')-> where('zone', '=', 0)->whereIn('currency_id',  ['USD', 'SAR'])->get();
        return view('/home', compact('lid','par','news','sana','aden','Banks') );


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
