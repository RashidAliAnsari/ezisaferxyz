<?php

namespace App\Http\Controllers\tenant\customer\auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\customer\Register;
use App\Notifications\TenantRegisterVerify;
use App\Http\Requests\tenant\RegisterRequest;

class RegisterController extends Controller
{
    
    public function register(RegisterRequest $request){
        
        // dd($request->all());
        $request->request->add(['verification_code' => Str::random(30)]);
        $request->merge(['password' => Hash::make($request->password)]);

        $customer = User::create($request->all());
        $roleId = Role::where('slug', 'customer')->pluck('id');
        $customer->roles()->attach($roleId);
        $customer->subdomain = $this->getHost($request);
        $customer->notify(new Register($customer));

        return redirect()->route('verify.email')->domain($this->getHost($request));

    }
    
    
}
