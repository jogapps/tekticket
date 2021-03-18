<?php

namespace App\Http\Requests\Administrator\Event;

use Illuminate\Foundation\Http\FormRequest;

class EditEventRequest extends FormRequest
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
        return $this->merge([
           'description' => $this->description_raw
        ]);
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
            'title' => 'required',
            //'slug' => 'required',
            'category_id' => 'required|exists:categories,id',
            'event_date' => 'required',
            'description_raw' => 'required',
            'description' => 'required',
            'street_1' => 'required',
            'city' => 'required',
            'state' => 'required',
        ];
    }
}
