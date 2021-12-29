<?php

namespace App\Http\Livewire\Admin\Pages;

use Livewire\Component;
use App\Models\BusinessType;

class BusinessTypes extends Component
{
    public $business_types, $form = [], $update_id, $destroyId;

    protected $rules = [
        'form.business_type' => 'required',
    ];

    protected $messages = [
        'form.business_type.required' => 'The Business Type cannot be empty.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->business_types = BusinessType::latest()->get();
        // $this->business_types = BusinessType::all();
    }

    public function store()
    {
        $validatedData = $this->validate();
        $business_type = BusinessType::create([
            'name' => $this->form['business_type'],
        ]);
        // $this->business_types->prepend($business_type);
        // $this->form = [];
        return redirect()->route('admin.business.types');
    }

    public function edit($id, $name)
    {
        $this->update_id = $id;
        $this->form['business_type'] = $name;
    }

    public function update()
    {
        BusinessType::where('id', $this->update_id)
        ->update(['name' => $this->form['business_type'],]);
        $this->form = [];
        return redirect()->route('admin.business.types');
    }

    public function destroyId($id)
    {
        $this->destroyId = $id;
    }

    public function destroy()
    {
        BusinessType::destroy($this->destroyId);
        return redirect()->route('admin.business.types');
    }

    public function deactivate($id)
    {
        BusinessType::where('id', $id)
        ->update(['is_active' => 0,]);
        return redirect()->route('admin.business.types');
    }

    public function activate($id)
    {
        BusinessType::where('id', $id)
        ->update(['is_active' => 1,]);
        return redirect()->route('admin.business.types');
    }

    public function render()
    {
        return view('livewire.admin.pages.business-types')
        ->layout('central.backend.layout.app', [
            
        ]);
    }
}
