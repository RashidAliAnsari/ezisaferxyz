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

    // public function mount(AdminService $AdminService)
    // {
    //     // $this->AdminService = $AdminService;
    //     // $this->AgencyProfile = $AdminService->AgencyProfile('8f6b4d66-59ea-42fa-aefa-e4fed439c8db');

    //     $tenant = Tenant::with('domains:domain,tenant_id')->where('id', '8f6b4d66-59ea-42fa-aefa-e4fed439c8db')->first();
    //     tenancy()->initialize($tenant);
        
    //     $tenantUser = User::whereNotNull('agency_name')->first();
    //     $tenantUser->tenant = $tenant;
    //     $this->AgencyProfile = $tenantUser;
    // }
    
    public function mount()
    {
        // dd(storage_path());
    }

    public function testFun($first, $second)
    {
        dd('function call');
        $tenant = Tenant::with('domains:domain,tenant_id')->where('id', '8f6b4d66-59ea-42fa-aefa-e4fed439c8db')->first();
        tenancy()->initialize($tenant);
        return $first;
    }

    public function like()
    {
        dd('from test.php class');
    }

    public function render()
    {
        return view('livewire.admin.test')
        ->layoutData([
            // 'AgencyProfile' =>  $this->AgencyProfile,
        ]);
    }
}
