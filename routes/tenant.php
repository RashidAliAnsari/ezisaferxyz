<?php

declare(strict_types=1);

use App\Http\Livewire\Tenant\Home;
use App\Http\Livewire\Tenant\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Tenant\NotApproved;
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
    'universal',
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
                
                // forget password for customer & Agency
                Route::get('forget-password', $namespaceTenant. '\auth\ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
                Route::post('forget-password', $namespaceTenant. '\auth\ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post'); 
                Route::get('reset-password/{token}', $namespaceTenant. '\auth\ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
                Route::post('reset-password', $namespaceTenant. '\auth\ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');
                


                // Agency After Logged in
                Route::group([
                    'middleware' => ['auth', 'isVerify', 'role:agency', 'isApproved'],
                    'as' => 'tenant.',
                ], function(){
                    
                    $T = 'App\Http\Livewire\Tenant';    // for tenant(agency) namespace
                    
                    Route::get('/home', $T.'\Home')->name('home');
                    Route::get('/not-approved', $T.'\NotApproved')->name('not-approved')->withoutMiddleware(['isApproved']);
                    Route::get('/profile', $T.'\Profile')->name('profile')->withoutMiddleware(['isApproved']);
                    
                });
                
                


                // Customer After Logged in
                Route::group([
                    'middleware' => ['auth', 'isVerify', 'role:customer'],
                    'as' => 'customer.',
                ], function(){

                    $T = 'App\Http\Livewire\Customer';    // for customer namespace
                
                    Route::get('/dashboard', $T.'\Dashboard')->name('dashboard');
                    // Route::get('/profile', $T.'\Profile')->name('profile');

                });
                


                
                // Common routes for Agency and customer after Logged in
                Route::middleware(['auth', 'isVerify'])->group(function(){
                    
                    Route::get('/switch-screen-mode/{is_dark_mode}', 'App\Http\Controllers\CommonController@screenMode')->name('screenMode');
                    
                });
                
                
                
            });
