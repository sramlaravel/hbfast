<?php

namespace App\Http\Controllers;

use App\country;
use app\city;
use App\servicespoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Generator\Method;
use Monolog\Handler\IFTTTHandler;

class countriescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getCountries()
    {
        $countries = DB::table('countries')->pluck("name_ar","id" );
        $all = DB::table('serv')->paginate(15);
        return view('agent',compact('countries','all'));
    }

    public function getStates($id)
    {

            $cities = DB::table("cities")->where('country_id', '=', $id)->pluck("city_name","id");

            return  json_encode($cities);

//
//        if ($request->ajax()) {
//
//            $cities = DB::table("cities")->where('country_id', '=', $id)->pluck("city_name", "id");
//
//            return response()->json([$cities]);
//
//
//        }

    }
    public function gettable($id)
    {
        $point = DB::table('serv')->where('city_id', '=', $id)->get();

        return  json_encode($point);
    }

    public function agent_search($search)
    {
        $searches =  DB::table('serv')->where ('name_point', 'LIKE',  $search . '%') ->orWhere('branch_name', 'LIKE',  $search . '%') ->orWhere('name_ar', 'LIKE',  $search . '%') ->orWhere('city_name', 'LIKE',  $search . '%')->get();


        return  json_encode($searches);
    }

    public function index()
    {

        $all = DB::table('serv')->get();

        return  json_encode($all);

//        $countries= DB::table('countries')->get();

//        ->orWhere('city_name', 'LIKE', '%' . $search_text . '%')->orWhere(desc_ar, 'like', "%{$search_text}%")


//        return view('/agent',compact( 'ser' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $idNew =  country::findOrFail($id);
        dd($idNew);
        $info = DB::table('cities')->select('id','city_name','country_id')->where('country_id','=', $idNew)->get();
        return view('/agent',compact('info'));

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
