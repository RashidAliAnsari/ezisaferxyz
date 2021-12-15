<?php

namespace App\Http\Livewire\Tenant;

use Livewire\Component;

class Profile extends Component
{
    public $updateMode = false;
    
    public function render()
    {
        return view('livewire.tenant.profile');
    }
}
