<?php

namespace App\Http\Controllers\tenant\auth;

use App\Models\User;
use App\Traits\SweetAlert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{

    use SweetAlert;
    
    public function verifyEmail(Request $request){
        $user = User::where('verification_code', $request->verification_code)->first();

        if ($user) {
            $user->is_verified = 1;
            $user->update(['is_verified' => 1]);
            Auth::login($user);
            $this->realRashidToast('You are logged in successfully', 'success');
            if (Auth::user()->hasRole('agency')) {
                return redirect()->route('home');
            }
            if(Auth::user()->hasRole('customer')) {
                return redirect()->route('dashboard');
            }
        } else {
            // $this->realRashidToast('Your verification code is incorrect', 'error');
            return back()->with('error', 'Your verification code is incorrect');
        }
        

    }
}
