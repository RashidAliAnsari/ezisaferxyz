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
    Route::get('dbSeed', 'TestController@dbSeed');
    Route::get('createTenant', 'TestController@createTenant');
    Route::get('test', 'TestController@test');
});

//Frontend routes
Route::view('/create/agency', 'central.frontend.createAgency');
Route::post('/create/agency', 'central\createAgency@store');




//Backend routes for super-admin
Route::group([
    'middleware' => ['auth', 'isVerify', 'role:super-admin'],
    'prefix' => 'admin',
    'as' => 'admin.',
], function(){
    // $namespace = 'App\Http\Controllers\central';
    $namespace = 'central';
    Route::view('/login', 'central.frontend.login')->name('login')->withoutMiddleware(['auth','isVerify','role:super-admin']);
    Route::post('/login', 'tenant\auth\LoginController@login')->name('login.post')->withoutMiddleware(['auth','isVerify','role:super-admin']);
    Route::post('/logout', 'tenant\auth\LoginController@logout')->name('logout');
    
    Route::get('/home', $namespace.'\HomeController@home')->name('home');
});



// common routes with tenant
Route::middleware(['auth', 'isVerify'])->group(function(){
    
    Route::get('/switch-screen-mode/{is_dark_mode}', 'CommonController@screenMode')->name('admin.screenMode');
    
});

