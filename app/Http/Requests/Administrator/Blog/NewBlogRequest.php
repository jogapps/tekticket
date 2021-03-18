<?php

namespace App\Http\Requests\Administrator\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Str;

class NewBlogRequest extends FormRequest
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
            'slug' => Str::slug($this->title),
            'description' => strip_tags($this->description_raw, '<strong>')
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
            'video_url' => 'nullable',
            'image' => 'nullable|image',
            'description_raw' => 'required',
            'description' => 'required',
        ];
    }
}
