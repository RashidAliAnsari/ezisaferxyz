<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.customer.dashboard')
        ->layout('tenant.customer.layout.app');
    }
}
