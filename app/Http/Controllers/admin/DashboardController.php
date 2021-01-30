<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\branches;
use App\Models\Comenews;
use App\Models\Jobs;
use App\Models\Language;
use App\Models\Partners;
use App\Models\points;
use App\Models\Services;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

           $services=Services::all();
        $Countservices = $services->count();

        $news=Comenews::all();
        $acountnews=$news->count();

       $locatouns= branches::all();
        $acountlocation=$locatouns->count();


        $Jobs= Jobs::all();
        $acountjobs=$Jobs->count();



        $point= points::all();
        $acountpoint=$point->count();


        $lider= Language::all();
       $acountslider =$lider->count();




        $partnts=Partners::all();
        $acountpartnts =$partnts->count();

         return view('admin.staticehome.static',compact('Countservices','acountnews','acountlocation','acountjobs','acountpoint','acountslider','acountpartnts'));
    }
}
