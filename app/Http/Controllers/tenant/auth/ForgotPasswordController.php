<?php

namespace App\Http\Controllers\tenant\auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ForgetPassword;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('tenant.frontend.auth.forgetPassword');
    }
    
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        
        $token = Str::random(64);
        
        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);
        
        $user = User::where('email', $request->email)->first();
        $url = $this->getHost($request) . '/reset-password' . '/' . $token;
        $user->notify(new ForgetPassword($url));

        $this->realRashidToast('We have e-mailed your password reset link!', 'success');
        return back();
    }
    
    public function showResetPasswordForm($token) { 
        return view('tenant.frontend.auth.forgetPasswordLink', ['token' => $token]);
    }
    
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);
        
        $updatePassword = DB::table('password_resets')
        ->where([
            'email' => $request->email, 
            'token' => $request->token,
            ])
            ->first();
            
            if(!$updatePassword){
                $this->realRashidToast('Invalid token!', 'error');
                return back();
            }
            
            $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);
            
            DB::table('password_resets')->where(['email'=> $request->email])->delete();
            
            $this->realRashidToast('Your password has been changed!', 'success');
            return redirect('/login');
        }
        
               
    }
