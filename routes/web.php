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

Route::get('/', function () {
    return view('central.frontend.welcome');
});

// test routes
Route::group(['prefix' => 'test'], function(){
    Route::get('clearCache', 'TestController@clearCache');
    Route::get('migrateFresh', 'TestController@migrateFresh');
    Route::get('createTenant', 'TestController@createTenant');
    Route::get('test', 'TestController@test');
});


Route::view('/create/agency', 'central.frontend.createAgency');
Route::post('/create/agency', 'central\createAgency@store');

