<?php

namespace App\Http\Livewire\Admin\Users\Agencies;

use App\Models\User;
use Livewire\Component;
use App\Services\AdminService;

class Index extends Component
{
    public $agencies;

    public function mount(AdminService $AdminService)
    {
        $this->agencies = $AdminService->getAllAgencies();
    }

    public function render()
    {
        return view('livewire.admin.users.agencies.index')
        ->layout('central.backend.layout.app', [
            'agencies'  =>  $this->agencies,
        ]);
    }
}
