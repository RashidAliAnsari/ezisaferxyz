<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        return view('livewire.customer.profile')
        ->layout('tenant.customer.layout.app');
    }
}
