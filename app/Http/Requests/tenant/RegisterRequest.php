<?php

namespace App\Http\Requests\tenant;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:60',
            'phone_no' => 'required|unique:users|digits_between:8,15',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The Name is required.',
            'phone_no.required' => 'The Phone no is required.',
            'email.required' => 'The Email is required.',
            'password.required' => 'The Password is required.',
        ];
    }

}
