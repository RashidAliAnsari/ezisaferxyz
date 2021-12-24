<?php

namespace App\Http\Livewire\Tenant;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.tenant.home')
        ->layout('tenant.backend.layout.app');
    }
}
