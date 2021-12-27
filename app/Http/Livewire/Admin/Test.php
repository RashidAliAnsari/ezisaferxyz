<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Tenant;
use Livewire\Component;
use App\Services\AdminService;

class Test extends Component
{
    private $AdminService; 
    public $AgencyProfile;
    public $other;
    public $tenantId;

    public function mount(AdminService $AdminService)
    {
        $this->tenantId = '8f6b4d66-59ea-42fa-aefa-e4fed439c8db';
        $this->AdminService = $AdminService;
        // $this->AgencyProfile = $AdminService->AgencyProfile('8f6b4d66-59ea-42fa-aefa-e4fed439c8db');
        // dd($AdminService->AgencyProfile('8f6b4d66-59ea-42fa-aefa-e4fed439c8db'));


        // $tenants = Tenant::with('domains:domain,tenant_id')->where('id', '8f6b4d66-59ea-42fa-aefa-e4fed439c8db')->get();
        // $tenant;
        // foreach ($tenants as $key => $tenant1) {
        //     tenancy()->initialize($tenant1);
        //     $tenant = $tenant1;
        // }
        
        // $tenantUser = User::whereNotNull('agency_name')->first();
        // $tenantUser->tenant = $tenant;
        // $this->AgencyProfile = $tenantUser;


        // $users = collect();

        // working here
        // $tenant = Tenant::with('domains:domain,tenant_id')->where('id', '8f6b4d66-59ea-42fa-aefa-e4fed439c8db')->first();
        // tenancy()->initialize($tenant);
        // $tenantUser = User::whereNotNull('agency_name')->first();
        // $tenantUser->tenant = $tenant;
        // $users->push($tenantUser);
        // $this->AgencyProfile = $users;     // here is the issue
        // $this->AgencyProfile = $tenantUser;     // here is the issue
        // echo $tenantUser .'<br><br><br>';
        // echo $this->AgencyProfile;
        // dd($this->AgencyProfile);

        // foreach ($tenants as $key => $tenant) {
        //     tenancy()->initialize($tenant);
            
        // }

        // tenancy()->end();

        // dd(User::all());
    }

    public function getAgencyProperty()
    {
        return $this->AdminService->AgencyProfile('8f6b4d66-59ea-42fa-aefa-e4fed439c8db');
    }
    

    public function testFun($first, $second)
    {
        dd('function call');
    }

    public function like()
    {
        dd(User::all());
        dd('from test.php class');
    }

    public function render()
    {
        return view('livewire.admin.test')
        ->layoutData([
            'AgencyProfile' =>  $this->AgencyProfile,
        ]);
    }
}
