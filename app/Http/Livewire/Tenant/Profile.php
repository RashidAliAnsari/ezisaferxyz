<?php

namespace App\Http\Livewire\Tenant;

use App\Models\Bank;
use App\Models\User;
use Livewire\Component;
use App\Models\BusinessType;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    use WithFileUploads;
    
    // public $updateMode = false;
    // public $agency_namee;
    // public $testUsers;
    public $form = [], $subdomain, $no_of_users, $business_types, $banks, $imagePath;
    
    protected $rules = [
        'form.agency_name' => 'required',
        'form.tourism_license_number' => 'required',
        'form.company_registration_number' => 'required',
        'form.business_type' => 'required',
        'form.company_acronym' => 'required',
        'form.no_of_branch' => 'required',
        'form.address' => 'required',
        'form.contact_person' => 'required',
        'form.telephone' => 'required',
        'form.handphone' => 'required',
        // 'form.email' => 'required|email|unique:users',
        'form.email' => 'required',
        'form.contact_person' => 'required',
        'form.banner_logo' => 'image|max:1024|mimes:jpg,png,jpeg',
        'form.profile_logo' => 'image|max:1024|mimes:jpg,png,jpeg',
    ];
    
    protected $messages = [
        'form.agency_name.required' => 'The Agency Name cannot be empty.',
        'form.tourism_license_number.required' => 'The Tourism License Number cannot be empty.',
        'form.company_registration_number.required' => 'The Company Registration Number cannot be empty.',
        'form.business_type.required' => 'Business Type cannot be empty.',
        'form.company_acronym.required' => 'The Company Acronym cannot be empty.',
        'form.no_of_branch.required' => 'The No Of Branch cannot be empty.',
        'form.address.required' => 'The Address cannot be empty.',
        'form.contact_person.required' => 'The Contact Person cannot be empty.',
        'form.telephone.required' => 'The Telephone cannot be empty.',
        'form.handphone.required' => 'The Handphone cannot be empty.',
        'form.email.required' => 'The Email cannot be empty.',
        'form.email.email' => 'The Email should be a valid email.',
        'form.contact_person.required' => 'The Contact Person cannot be empty.',
        'form.contact_person.required' => 'The Contact Person cannot be empty.',
        'form.banner_logo.image' => 'The Banner Logo should be an image.',
        'form.banner_logo.max' => 'The Banner Logo can not be greater than 1MB.',
        'form.profile_logo.image' => 'The Profile Logo should be an image.',
        'form.profile_logo.max' => 'The Profile Logo can not be greater than 1MB.',
    ];
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function mount()
    {
        
        $this->form['agency_name'] = $this->agency->agency_name;
        $this->form['email'] = Auth::user()->email;
        $this->form['website'] = request()->getHost();
        
        if ($this->agency->profile) {
            
            $this->form['tourism_license_number'] = $this->agency->profile->tourism_license_number;
            $this->form['company_registration_number'] = $this->agency->profile->company_registration_number;
            $this->form['business_type'] = $this->agency->profile->business_type;
            $this->form['company_acronym'] = $this->agency->profile->company_acronym;
            $this->form['no_of_branch'] = $this->agency->profile->no_of_branch;
            $this->form['address'] = $this->agency->profile->address;
            $this->form['country'] = $this->agency->profile->country;
            $this->form['state'] = $this->agency->profile->state;
            $this->form['city'] = $this->agency->profile->city;
            $this->form['post_code'] = $this->agency->profile->post_code;
            $this->form['latitude'] = $this->agency->profile->latitude;
            $this->form['longitude'] = $this->agency->profile->longitude;
            
            $this->form['contact_person'] = $this->agency->profile->contact_person;
            $this->form['telephone'] = $this->agency->profile->telephone;
            $this->form['fax_no'] = $this->agency->profile->fax_no;
            $this->form['handphone'] = $this->agency->profile->handphone;
            
            $this->form['account_holder_name'] = $this->agency->profile->account_holder_name;
            $this->form['bank_name'] = $this->agency->profile->bank_name;
            $this->form['bank_account_number'] = $this->agency->profile->bank_account_number;
            
            // $this->form['banner_logo'] = $this->agency->profile->banner_logo;
            // $this->form['profile_logo'] = $this->agency->profile->profile_logo;
            
        }
        

        // $tenantId = \DB::connection()->getDatabaseName();
        // $this->imagePath = base_path('storage/'.$tenantId.'/app'.'/'.Auth::user()->profile->profile_logo);
        // dd(storage_path());
        // dd(asset('app'));
        // dd(public_path());
        // dd(tenant_asset('app'));
        // dd(asset('images'));
        // dd(storage_path('app/photos/xgXg75SdSx1y5CRGYcewQb5mA9tUDEU3Hdr4XrOd.jpg'));
        // dd(storage_path() . '/' . Auth::user()->profile->profile_logo);
        $this->subdomain = strtok(request()->getHost(), '.');
        $this->no_of_users = User::where('agency_name', '')->count();
        
        tenancy()->central(function () {
            $this->business_types = BusinessType::where('is_active', 1)->get();
            $this->banks = Bank::where('is_active', 1)->get();
            // $this->banks = Bank::all()->groupBy('country_name');
            
        });
        
    }

    
    public function getAgencyProperty()
    {
        // return Auth::user();
        return User::where('id', Auth::user()->id)->with('profile')->first();
    }
    
    public function submit()
    {
        $validatedData = $this->validate();

        // $form['banner_logo'] = (isset($this->form['banner_logo'])) ? $this->form['banner_logo']->store('photos') : '' ;
        // $this->form['profile_logo'] = (isset($this->form['profile_logo'])) ? $this->form['profile_logo']->store('photos') : '' ;

        if (isset($this->form['banner_logo'])) {
            $form['banner_logo'] = $this->form['banner_logo']->store('photos');
        }

        if(isset($this->form['profile_logo'])){
            $this->form['profile_logo'] = $this->form['profile_logo']->store('photos');

            

            // dd($this->form['profile_logo']);
            // $tenantId = \DB::connection()->getDatabaseName();
            // $file = $this->form['profile_logo'] ;
            // $fileName = $file->getClientOriginalName() ;
            // $destinationPath = public_path(). '/' . 'tenancy/'. $tenantId .'/images' ;
            // $file->move($destinationPath,$fileName);

            // $this->form['profile_logo'] = $fileName;


        }
        
        ($this->agency->profile) ? $this->update() : $this->store() ;

        return redirect()->route('tenant.profile');
        
    }
    
    public function store()
    {
        DB::table('profiles')->insert([
            [
                'user_id' => $this->agency->id,
                'tourism_license_number' => $this->form['tourism_license_number'],
                'company_registration_number' => $this->form['company_registration_number'],
                'business_type' => $this->form['business_type'],
                'company_acronym' => $this->form['company_acronym'],
                'no_of_branch' => $this->form['no_of_branch'],
                'address' => $this->form['address'],
                'country' => isset($this->form['country']) ? $this->form['country'] : '',
                'state' => isset($this->form['state']) ? $this->form['state'] : '',
                'city' => isset($this->form['city']) ? $this->form['city'] : '',
                'post_code' => isset($this->form['post_code']) ? $this->form['post_code'] : '',
                'latitude' => isset($this->form['latitude']) ? $this->form['latitude'] : '',
                'longitude' => isset($this->form['longitude']) ? $this->form['longitude'] : '',
                'contact_person' => $this->form['contact_person'],
                'telephone' => $this->form['telephone'],
                'fax_no' => isset($this->form['fax_no']) ? $this->form['fax_no'] : '',
                'handphone' => $this->form['handphone'],
                'website' => $this->form['website'],
                'account_holder_name' => isset($this->form['account_holder_name']) ? $this->form['account_holder_name'] : '',
                'bank_name' => isset($this->form['bank_name']) ? $this->form['bank_name'] : '',
                'bank_account_number' => isset($this->form['bank_account_number']) ? $this->form['bank_account_number'] : '',
                'banner_logo' => isset($this->form['banner_logo']) ? $this->form['banner_logo'] : '',
                'profile_logo' => isset($this->form['profile_logo']) ? $this->form['profile_logo'] : '',
            ],
        ]);
    }
    
    public function update()
    {
        // dd($this->form);
        // dd(isset($this->form['profile_logo']) ? $this->form['profile_logo'] : $this->agency->profile->profile_logo);
        DB::table('profiles')->where('id', $this->agency->profile->id)
        ->update(
            [
                'user_id' => $this->agency->id,
                'tourism_license_number' => $this->form['tourism_license_number'],
                'company_registration_number' => $this->form['company_registration_number'],
                'business_type' => $this->form['business_type'],
                'company_acronym' => $this->form['company_acronym'],
                'no_of_branch' => $this->form['no_of_branch'],
                'address' => $this->form['address'],
                'country' => isset($this->form['country']) ? $this->form['country'] : '',
                'state' => isset($this->form['state']) ? $this->form['state'] : '',
                'city' => isset($this->form['city']) ? $this->form['city'] : '',
                'post_code' => isset($this->form['post_code']) ? $this->form['post_code'] : '',
                'latitude' => isset($this->form['latitude']) ? $this->form['latitude'] : '',
                'longitude' => isset($this->form['longitude']) ? $this->form['longitude'] : '',
                'contact_person' => $this->form['contact_person'],
                'telephone' => $this->form['telephone'],
                'fax_no' => isset($this->form['fax_no']) ? $this->form['fax_no'] : '',
                'handphone' => $this->form['handphone'],
                'website' => $this->form['website'],
                'account_holder_name' => isset($this->form['account_holder_name']) ? $this->form['account_holder_name'] : '',
                'bank_name' => isset($this->form['bank_name']) ? $this->form['bank_name'] : '',
                'bank_account_number' => isset($this->form['bank_account_number']) ? $this->form['bank_account_number'] : '',
                'banner_logo' => isset($this->form['banner_logo']) ? $this->form['banner_logo'] : $this->agency->profile->banner_logo,
                'profile_logo' => isset($this->form['profile_logo']) ? $this->form['profile_logo'] : $this->agency->profile->profile_logo,
            ],
        );
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
