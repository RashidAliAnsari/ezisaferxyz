<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Services\AdminService;

class Localization extends Component
{
    public $languages, $columns, $columnsCount, $form = [], $destroyId, 
    $updateKeyMode = false, $updateKey, $updateValue, $updateValueCode;

    protected $rules = [
        'form.key' => 'required',
        'form.value_en' => 'required',
        'form.value_ms' => 'required',
    ];

    protected $messages = [
        'form.key.required' => 'The Key cannot be empty.',
        'form.value_en.required' => 'The English Value cannot be empty.',
        'form.value_ms.required' => 'The Malay value cannot be empty.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(AdminService $adminService)
    {
        $result = $adminService->languages();
        $this->languages = $result['languages'];
        $this->columns = $result['columns'];
        $this->columnsCount = $result['columnsCount'];
    }


    public function store(AdminService $adminService)
    {
        $validatedData = $this->validate();
    
        $data = $adminService->openJSONFile('en');
        $data[$this->form['key']] = $this->form['value_en'];
        $adminService->saveJSONFile('en', $data);
		
        $data = $adminService->openJSONFile('ms');
        $data[$this->form['key']] = $this->form['value_ms'];
        $adminService->saveJSONFile('ms', $data);

        return redirect()->route('admin.localization');
    }

    public function destroyId($key)
    {
        $this->destroyId = $key;
    }

    public function destroy(AdminService $adminService)
    {
        $adminService->destroyTranslation($this->destroyId);
        return redirect()->route('admin.localization');
    }

    public function editKey($key)
    {
        $this->updateKeyMde = true;
        $this->updateKey = $key;
        $this->form['key'] = $key;
        $this->form['value_en'] = 'dummy en value';
        $this->form['value_ms'] = 'dummy ms value';
    }

    public function updateKey(AdminService $adminService)
    {
        $validatedData = $this->validate();
        $adminService->transUpdateKey($this->updateKey, $this->form['key']);
        $this->form = [];
        return redirect()->route('admin.localization');
    }

    public function editValue(AdminService $adminService, $key)
    {
        $this->updateKeyMde = true;
        $this->updateKey = $key;
        $this->form['key'] = $key;
        $result = $adminService->transEditValuesAgainstSingleKey($this->updateKey);
        $this->form['value_en'] = $result['en'];
        $this->form['value_ms'] = $result['ms'];
    }

    public function updateValue(AdminService $adminService)
    {
        $validatedData = $this->validate();
        $adminService->transUpdate($this->form);
        $this->form = [];
        return redirect()->route('admin.localization');
    }


    public function render()
    {
        return view('livewire.admin.localization')
        ->layout('central.backend.layout.app', [
            
        ]);
    }
}
