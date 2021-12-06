<?php

namespace App\Http\Requests\tenant;

use App\Traits\SweetAlert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    use SweetAlert;
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
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'The Email is required.',
            'password.required' => 'The Password is required.',
        ];
    }


}
