<?php

namespace App\Http\Controllers\tenant\auth;

use App\Models\User;
use App\Traits\SweetAlert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\tenant\LoginRequest;

class LoginController extends Controller
{

    use SweetAlert;
    // for both tenant and customer
    public function login(Request $request){
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // dd($credentials);
        if (Auth::attempt($credentials)) {
        // if (Auth::attempt($request->all())) {
            $this->realRashidToast('You are logged in successfully', 'success');
            if (Auth::user()->hasRole('agency')) {
                return redirect()->route('home');
            }
            if(Auth::user()->hasRole('customer')) {
                return redirect()->route('dashboard');
            }
        }

        $this->realRashidToast('Login details are not valid', 'error');
        return back();

    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

    }


}
