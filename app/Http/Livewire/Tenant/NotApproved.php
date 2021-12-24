<?php

namespace App\Http\Livewire\Tenant;

use Livewire\Component;

class NotApproved extends Component
{
    public function render()
    {
        return view('livewire.tenant.not-approved')
        ->layout('tenant.backend.layout.app');
    }
}
