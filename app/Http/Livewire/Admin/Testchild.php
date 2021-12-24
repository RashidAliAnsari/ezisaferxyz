<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Testchild extends Component
{
    public function like()
    {
        dd('like function call');
    }

    public function render()
    {
        return view('livewire.admin.testchild');
    }
}
