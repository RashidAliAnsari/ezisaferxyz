<?php

namespace App\Http\Livewire\Admin\Users\Agencies;

use Livewire\Component;
use App\Services\AdminService;

class ShowProfile extends Component
{
    private $AdminService; 
    public $AgencyProfile;
    
    public function mount($tenantId, AdminService $AdminService)
    {
        $this->AdminService = $AdminService;
        $this->AgencyProfile = $AdminService->AgencyProfile($tenantId);
    }

    // public function AgencyApprove($tenantId, $status)
    // public function AgencyApprove()
    // {
    //     $result = $this->AdminService->ApproveDeclineTenant($tenantId, $status);
    //     $this->realRashidToast($result['message'], $result['type']);
    // }

    public function test()
    {
        dd('hello');
    }

    public function render()
    {
        return view('livewire.admin.users.agencies.show-profile')
        ->layout('central.backend.layout.app', [
            'AgencyProfile' =>  $this->AgencyProfile,
        ]);
    }
}
