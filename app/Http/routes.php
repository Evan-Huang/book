<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/query1",['uses' => 'StudentController@query1']);
Route::get("/query2",['uses' => 'StudentController@query2']);
Route::get("/query3",['uses' => 'StudentController@query3']);
Route::get("/query4",['uses' => 'StudentController@query4']);
Route::get("/query5",['uses' => 'StudentController@query5']);
Route::get("/query6",['uses' => 'StudentController@query6']);

Route::get("/orm1",['uses' => 'StudentController@orm1']);
Route::get("/orm2",['uses' => 'StudentController@orm2']);
Route::get("/orm3",['uses' => 'StudentController@orm3']);
Route::get("/orm4",['uses' => 'StudentController@orm4']);

Route::get("/section1",['uses' => 'StudentController@section1']);
Route::get("/url",['as' => 'url','uses' => 'StudentController@urlTest']);
Route::get("/request1",['uses' => 'StudentController@request1']);

Route::get("/listpage",['uses' => 'StudentController@listpage']);
Route::any("/create",['uses' => 'StudentController@create']);
Route::any("/save",['uses' => 'StudentController@save']);



Route::group(['middleware' => ['web']], function (){
    Route::any("/session1",['uses' => 'StudentController@session1']);
    Route::any("/session2",['uses' => 'StudentController@session2']);
    Route::any("/response",['uses' => 'StudentController@response']);
});
//宣传页面
Route::get("/activity0",['uses' => 'StudentController@activity0']);
//互动页面
Route::group(['middleware' => ['activity']], function () {
    Route::get("/activity1",['uses' => 'StudentController@activity1']);
    Route::get("/activity2",['uses' => 'StudentController@activity2']);
});


Route::auth();

Route::get('/home', 'HomeController@index');
