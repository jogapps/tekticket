<?php

namespace App\Http\Requests\Administrator\Event;

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
            'organizer_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'category_id' => 'required|exists:categories,id',
            'event_date' => 'required|date|after:today',
            'description_raw' => 'required',
            'description' => 'required',
            'street_1' => 'required',
            'street_2' => 'nullable',
            'city' => 'required',
            'state' => 'required',
            'image' => 'sometimes|required|image',
        ];
    }
}
