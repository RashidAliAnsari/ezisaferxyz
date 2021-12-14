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
    Route::get('migrate', 'TestController@migrate');
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

    Route::get('/agencies', $namespace.'\HomeController@showAllAgencies')->name('agencies.show');
    Route::get('/agencies/{tenantId}/profile', $namespace.'\HomeController@AgencyProfile')->name('agency.profile');
    Route::get('/agency/approve/{tenantId}/{status}', $namespace.'\HomeController@AgencyApprove')->name('agency.approve');

    // multilingual - translations
    Route::get('languages', $namespace.'\HomeController@getAllLanguages')->name('languages');
    Route::post('translations/update', $namespace.'\HomeController@transUpdate')->name('translation.update.json');
    Route::post('translations/updateKey', $namespace.'\HomeController@transUpdateKey')->name('translation.update.json.key');
    Route::delete('translations/destroy/{key}', $namespace.'\HomeController@destroyTranslation')->name('translations.destroy');
    Route::post('translations/create', $namespace.'\HomeController@storeTranslation')->name('translations.create');


});



// common routes with tenant
Route::middleware(['auth', 'isVerify'])->group(function(){
    
    Route::get('/switch-screen-mode/{is_dark_mode}', 'CommonController@screenMode')->name('admin.screenMode');

    Route::get('lang/change', 'CommonController@changeLang')->name('changeLang')->withoutMiddleware(['auth', 'isVerify']);
    
});

