<?php

namespace App\Http\Livewire\Admin\Users\Agencies;

use App\Models\User;
use Livewire\Component;
use App\Services\AdminService;
use Illuminate\Support\Facades\URL;

class ShowProfile extends Component
{
    public $tenantId;
    private $AdminService; 

    
    public function mount($tenantId, AdminService $AdminService)
    {
        $this->AdminService = $AdminService;
        $this->$tenantId = $tenantId;
    }

    public function getAgencyProperty(AdminService $AdminService)
    {

        // return $this->AdminService->AgencyProfile($this->tenantId);
        return $AdminService->AgencyProfile($this->tenantId);
    }

    public function AgencyApprove(AdminService $AdminService, $tenantId, $status)
    {
        $result = $AdminService->ApproveDeclineTenant($tenantId, $status);
        // $this->realRashidToast($result['message'], $result['type']);
        return redirect()->route('admin.agency.profile', ['tenantId' => $this->tenantId]);
    }


    public function render()
    {
        return view('livewire.admin.users.agencies.show-profile')
        ->layout('central.backend.layout.app', [
            
        ]);
    }
}
