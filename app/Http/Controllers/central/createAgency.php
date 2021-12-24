<?php

namespace App\Http\Controllers\central;

use session;
use App\Models\Role;
use App\Models\User;
use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Notifications\TenantRegisterVerify;
use App\Http\Requests\central\CreateAgencyRequest;

class createAgency extends Controller
{
    
    public function store(CreateAgencyRequest $request)
    {

        $host = request()->getHost();
        // $domain = $request->domain . '.' . $host; // doin in request class now

        // mkdir("C:/laragon/www/".$domain , 0755 , true);

        $tenant = Tenant::create();
        // $tenant->domains()->create(['domain' => $domain]);
        $tenant->domains()->create(['domain' => $request->domain]);

        // change request object as required
        $request->request->add(['verification_code' => Str::random(30)]);
        // $request->request->add(['subdomain' => $domain]);
        $request->merge(['password' => Hash::make($request->password)]);

        $request->session()->put('agency', $request->all());

        $tenant->run(function () {
            $agency = session('agency');
            $user = User::create($agency);
            $roleId = Role::where('slug', 'agency')->pluck('id');
            $user->roles()->attach($roleId);
            $user->notify(new TenantRegisterVerify($agency));
            session()->forget('agency');
        });

        // for creating tenant directories in storage folder
        $storage_path = storage_path();
        $storage_path = $storage_path . '/' . 'tenant'.$tenant->id;
        mkdir("$storage_path/framework/cache", 0777, true);


        return redirect()->route('verify.email')->domain($request->domain);

    }

    
}
