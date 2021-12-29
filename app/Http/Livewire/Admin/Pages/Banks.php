<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Bank;
use Livewire\Component;

class Banks extends Component
{
    public $banks, $countries, $form = [], $update_id, $destroyId;
    
    protected $rules = [
        'form.bank_name' => 'required',
        'form.country_name' => 'required',
    ];
    
    protected $messages = [
        'form.bank_name.required' => 'The Bank Name cannot be empty.',
        'form.country_name.required' => 'The Country Name cannot be empty.',
    ];
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function mount()
    {
        $this->banks = Bank::latest()->get();
        $this->countries = Countries::getList('en', 'json');
    }
    
    public function store()
    {
        $validatedData = $this->validate();
        $bank = Bank::create([
            'bank_name' => $this->form['bank_name'],
            'country_name' => $this->form['country_name'],
        ]);
        return redirect()->route('admin.banks');
    }
    
    public function edit($id, $bank_name, $country_name)
    {
        $this->update_id = $id;
        $this->form['bank_name'] = $bank_name;
        $this->form['country_name'] = $country_name;
    }
    
    public function update()
    {
        Bank::where('id', $this->update_id)
        ->update([
            'bank_name' => $this->form['bank_name'],
            'country_name' => $this->form['country_name'],
        ]);
        $this->form = [];
        return redirect()->route('admin.banks');
    }
    
    public function destroyId($id)
    {
        $this->destroyId = $id;
    }
    
    public function destroy()
    {
        Bank::destroy($this->destroyId);
        return redirect()->route('admin.banks');
    }
    
    public function deactivate($id)
    {
        Bank::where('id', $id)
        ->update(['is_active' => 0,]);
        return redirect()->route('admin.banks');
    }
    
    public function activate($id)
    {
        Bank::where('id', $id)
        ->update(['is_active' => 1,]);
        return redirect()->route('admin.banks');
    }
    

    public function render()
    {
        return view('livewire.admin.pages.banks')
        ->layout('central.backend.layout.app', [
            
        ]);
    }
}
