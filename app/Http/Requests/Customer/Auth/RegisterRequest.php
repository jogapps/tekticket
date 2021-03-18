<?php

namespace App\Http\Requests\Auth;

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
        if ($this->isMethod('get')) {
            return [];
        }
        return [
            'name' => 'required|max:100',
            'email' => 'required|unique:users|max:50',
            'password' => 'required|string|min:6|max:20|confirmed',
            'address' => 'nullable',
            'country' => 'nullable',
            'state' => 'nullable',
            'city' => 'nullable',
            'phone' => 'nullable',
            'terms' => 'accepted'
        ];
    }
}
