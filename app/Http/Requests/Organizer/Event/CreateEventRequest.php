<?php

namespace App\Http\Requests\Organizer\Event;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CreateEventRequest extends FormRequest
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

    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
            'description' => strip_tags($this->description_raw,'<strong></strong>'),
            'organizer_id' => $this->user()->id
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
            'slug' => 'required',
            'category_id' => 'required|exists:categories,id',
            'event_date' => 'required|date|after:today',
            'description_raw' => 'required',
            'description' => 'required',
            'street_1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'image' => 'sometimes|required|image',
        ];
    }

    public function messages()
    {
        return [
            'email_verify.in' => 'Please verify your email address before creating an event',
            'category_id.required' => 'select a category',
            'category_id.exists' => 'Invalid category',
        ];
    }

}
