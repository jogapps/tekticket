<?php

namespace App\Http\Requests\Customer\GiftVourcher;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePurchaseRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'not_same_email' => $this->user()->email !== $this->email
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email:filter|exists:users',
            'amount' => 'required|numeric',
            'not_same_email' => 'accepted'
        ];
    }

    public function messages()
    {
        return [
          'email.exists' => 'This email is not a registered email',
          'not_same_email.accepted' => 'You can\'t gift yourself a voucher'
        ];
    }
}
