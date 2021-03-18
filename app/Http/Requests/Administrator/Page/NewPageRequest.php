<?php

namespace App\Http\Requests\Administrator\Page;

use Illuminate\Foundation\Http\FormRequest;
use Str;

class NewPageRequest extends FormRequest
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
            'slug' => Str::slug($this->title)
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
            'content' => 'required'
        ];
    }
}
