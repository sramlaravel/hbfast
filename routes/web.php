<?php

use Illuminate\Support\Facades\Route;


/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index' );

Route::get('/fag', function () {
    return view('fags');
});

Route::get('/policy', function () {
    return view('policy');
});


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('services', 'ServiceController@services')->name('services');
route::get('/home','sliderController@index');
Route::get('about', 'AboutController@index')->name('about');
Route::get('/locations','LocationController@location') ;

Route::get('agent','countriescontroller@getCountries');
Route::get('agent/getstates/{id}','countriescontroller@getStates');

Route::get('agent/gettable/{id}','countriescontroller@gettable');
Route::get('agent/agent_search/{id}','countriescontroller@agent_search');
Route::get('agent/index/','countriescontroller@index');



Route::get('news','NewsController@index');
//Route::get('news/new','NewsController@index');

Route::get('news/details/{id}','NewsController@detail');

Route::get('localservices/{id}','localPartnerController@index');

Route::get('/contact', ['uses' => 'ContactController@index']);

// Post form data
Route::post('/contact', [
    'uses' => 'ContactController@store',
    'as' => 'contact.store'

]);
Route::get('/help' , [
    'uses' => 'helpsController@index'
]);
Route::post('/help', [
    'uses' => 'helpsController@store',
    'as' => 'help.store'

]);


Route::get('jobs','JobController@index');

Route::get('/upload-file', 'FileUpload@createForm');


Route::get('careers/apply/{id}','ApplyController@index');

Route::post('careers/apply/{id} ', 'ApplyController@fileUpload')->name('fileUpload');




//Route::group(['prefix'=>'news'],function ()
//{
//    Route::get('new','NewsController@index');
//    Route::get('details/{id}','NewsController@details');
//});

//factory(App\service_point::CLASS,5)->create();
//factory(App\location::CLASS,5)->create();
//route::get('/home','PartnerController@index');
//factory(App\partners::CLASS,5)->create();
//factory(App\partners::CLASS,5)->create();

//factory(App\country::CLASS,5)->create();
//
// factory(App\Job::CLASS,5)->create();