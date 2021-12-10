<?php

namespace App\Http\Controllers\tenant\auth;

use App\Models\User;
// use App\Traits\SweetAlert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\tenant\LoginRequest;

class LoginController extends Controller
{

    // use SweetAlert;
    // for both tenant and customer
    public function login(LoginRequest $request){
        // dd('reach');
        if (Auth::attempt($request->only('email','password'))) {
            $this->realRashidToast('You are logged in successfully', 'success');
            if (Auth::user()->hasRole('agency')) {
                return redirect()->route('home');
            }
            if(Auth::user()->hasRole('customer')) {
                return redirect()->route('dashboard');
            }
            if(Auth::user()->hasRole('super-admin')) {
                return redirect()->route('admin.home');
            }
        }

        return back()->with('error','The provided credentials do not match our records.');


    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

    }


}
