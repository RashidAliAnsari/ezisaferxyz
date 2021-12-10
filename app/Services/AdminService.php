<?php 

namespace App\Services;

use App\Models\User;
use App\Models\Tenant;

class AdminService
{

    private function initilizeSingleTenant($tenantId)
    {
        $tenant = Tenant::with('domains:domain,tenant_id')->where('id', $tenantId)->first();
        tenancy()->initialize($tenant);
        return $tenant;
    }

    public function getAllAgencies()
    {
        $users = collect();
        $tenants = Tenant::with('domains:domain,tenant_id')->get();
        
        foreach ($tenants as $key => $tenant) {
            tenancy()->initialize($tenant);
            $tenantUser = User::whereNotNull('agency_name')->first();
            $tenantUser->tenant = $tenant;
            $users->push($tenantUser);
        }
        return $users;
    }

    public function AgencyProfile($tenantId)
    {
        $tenant = $this->initilizeSingleTenant($tenantId);
        $tenantUser = User::whereNotNull('agency_name')->first();
        $tenantUser->tenant = $tenant;
        return $tenantUser;
    }

    public function ApproveDeclineTenant($tenantId, $status)
    {
        $this->initilizeSingleTenant($tenantId);
        if ($status == 0) {
            User::whereNotNull('agency_name')->update(['is_approved' => 0]);
            return array('type' => 'warning', 'message' => 'Your Agency has ben declined successfully.');
        }
        if ($status == 1) {
            User::whereNotNull('agency_name')->update(['is_approved' => 1]);
            return array('type' => 'success', 'message' => 'Your Agency has ben approved successfully.');
        }
        
    }


}