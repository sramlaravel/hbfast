<?php

namespace App\Http\Controllers;
use App\Models\Banks;
use App\Models\Currenies;
use App\Models\PartnersLocal;
use App\News;
use App\Partners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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


}
