<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Home extends Component
{
    public function mount()
    {
        // dd(tenant_asset('app'));
        // dd(storage_path());
    }
    public function like()
    {
        dd('like fun');
    }
    public function render()
    {
        return view('livewire.admin.home')
        ->layout('central.backend.layout.app');
    }
}
