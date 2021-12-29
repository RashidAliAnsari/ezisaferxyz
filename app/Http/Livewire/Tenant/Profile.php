<?php

namespace App\Http\Livewire\Tenant;

use App\Models\Bank;
use App\Models\User;
use Livewire\Component;
use App\Models\BusinessType;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    use WithFileUploads;
    
    // public $updateMode = false;
    // public $agency_namee;
    // public $testUsers;
    public $form = [], $subdomain, $no_of_users, $business_types, $banks;
    
    protected $rules = [
        'form.agency_name' => 'required',
        'form.tourism_license_number' => 'required',
        'form.company_registration_number' => 'required',
        'form.business_type' => 'required',
        'form.company_acronym' => 'required',
        'form.no_of_branch' => 'required',
        'form.banner_logo' => 'image|max:1024|mimes:jpg,png,jpeg',
        'form.address' => 'required',
        'form.contact_person' => 'required',
        'form.telephone' => 'required',
        'form.handphone' => 'required',
        'form.email' => 'required|email|unique:users',
        'form.profile_logo' => 'image|max:1024|mimes:jpg,png,jpeg',
        'form.contact_person' => 'required',
    ];

    protected $messages = [
        'form.agency_name.required' => 'The Agency Name cannot be empty.',
        'form.tourism_license_number.required' => 'The Tourism License Number cannot be empty.',
        'form.company_registration_number.required' => 'The Company Registration Number cannot be empty.',
        'form.business_type.required' => 'Business Type cannot be empty.',
        'form.company_acronym.required' => 'The Company Acronym cannot be empty.',
        'form.no_of_branch.required' => 'The No Of Branch cannot be empty.',
        'form.banner_logo.image' => 'The Banner Logo should be an image.',
        'form.banner_logo.max' => 'The Banner Logo can not be greater than 1MB.',
        'form.address.required' => 'The Address cannot be empty.',
        'form.contact_person.required' => 'The Contact Person cannot be empty.',
        'form.telephone.required' => 'The Telephone cannot be empty.',
        'form.handphone.required' => 'The Handphone cannot be empty.',
        'form.email.required' => 'The Email cannot be empty.',
        'form.email.email' => 'The Email should be a valid email.',
        'form.profile_logo.image' => 'The Profile Logo should be an image.',
        'form.profile_logo.max' => 'The Profile Logo can not be greater than 1MB.',
        'form.contact_person.required' => 'The Contact Person cannot be empty.',
        'form.contact_person.required' => 'The Contact Person cannot be empty.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        // $this->agency_namee = Auth::user()->agency_name;
        $this->form['agency_name'] = Auth::user()->agency_name;
        $this->form['business_type'] = 2;
        $this->form['bank_name'] = 1;

        // dd(storage_path());
        $this->subdomain = strtok(request()->getHost(), '.');
        $this->no_of_users = User::where('agency_name', '')->count();

        tenancy()->central(function () {
            $this->business_types = BusinessType::where('is_active', 1)->get();
            $this->banks = Bank::where('is_active', 1)->get();
            // $this->banks = Bank::all()->groupBy('country_name');
            
            // foreach ($this->banks as $country) {
            //     foreach ($country as $list) {
            //         echo $list . '<br><br>';
            //     }
            // }
            
            // dd($this->banks);
        });

    }

    public function getAgencyProperty()
    {
        return Auth::user();
    }

    public function submit()
    {
        $validatedData = $this->validate();
        dd('data submitted');
    }

    public function upgradePackage()
    {
        dd('ahaha upgrade package');
        tenancy()->central(function () {
            $this->testUsers = User::all();
        });

        // $users = User::all();
        // dd($this->testUsers);
        return '$users';
        // return '$users123';
    }

    public function render()
    {
        return view('livewire.tenant.profile')
        ->layout('tenant.backend.layout.app', [
            // 'agency_name' => $this->agency_namee
        ]);
    }
}
