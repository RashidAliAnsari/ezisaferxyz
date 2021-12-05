<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    // Route::get('/', function () {
    //     dd(\App\Models\User::all());
    //     return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    // });

    // Route::get('/forTenant', function () {
    //     return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    // });

    $namespaceTenant = 'App\Http\Controllers\tenant';
    $namespaceCustomer = 'App\Http\Controllers\tenant\customer';
    $resources = 'tenant.backend';

    Route::view('/', 'tenant.frontend.welcome')->name('welcome');
    Route::view('/login', 'tenant.frontend.auth.login')->name('login');
    Route::view('/register', 'tenant.frontend.auth.register')->name('register');
    Route::view('/verify/email', 'tenant.frontend.auth.verify')->name('verify.email');

    Route::post('/verify/email', $namespaceTenant.'\auth\VerifyEmailController@verifyEmail')->name('verify.email.post');
    Route::post('/login', $namespaceTenant.'\auth\LoginController@login')->name('login.post');

    Route::post('/logout', $namespaceTenant.'\auth\LoginController@logout')->name('logout');
    Route::post('/register', $namespaceCustomer.'\auth\RegisterController@register')->name('register.customer');

    // Agency After Logged in
    Route::middleware(['auth', 'isVerify', 'role:agency'])->group(function(){

        $namespaceTenant = 'App\Http\Controllers\tenant';
        $resources = 'tenant.backend';

        Route::view('/home', $resources.'.home')->name('home');


    });


    // Customer After Logged in
    Route::middleware(['auth', 'isVerify', 'role:customer'])->group(function(){

        $namespaceCustomer = 'App\Http\Controllers\tenant\customer';
        $resources = 'tenant.customer';

        Route::get('/dashboard', $namespaceCustomer.'\DashboardController@index')->name('dashboard');
    });

    

});
