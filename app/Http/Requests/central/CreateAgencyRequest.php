<?php

namespace App\Http\Requests\central;

use Illuminate\Foundation\Http\FormRequest;

class CreateAgencyRequest extends FormRequest
{
    /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
    public function authorize()
    {
        return true;
    }
    
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        return [
            'agency_name' => 'required|max:255',
            'domain' => 'required|unique:domains|max:60',
            'name' => 'required|max:60',
            'phone_no' => 'required|digits_between:8,15',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
        ];
    }
    
    protected function prepareForValidation()
    {
        $this->merge([
            'domain' => ($this->domain) ? $this->domain . '.' . request()->getHost() : '',
        ]);
    }
    
    public function messages()
    {
        return [
            'agency_name.required' => 'Agency name is required.',
            'domain.required' => 'Subdomain is required.',
            'domain.unique' => 'Subdomain has already been taken.',
            'name.required' => 'Name is required.',
            'phone_no.required' => 'Phone no is required.',
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.',
        ];
    }
    
}
