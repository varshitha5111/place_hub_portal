<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class listUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => ['nullable', 'image'],
            'thumb_img' => ['nullable', 'image'],
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'integer'],
            'location' => ['required', 'integer'],
            'address' => ['required', 'string', 'max:2000'],
            'phone' => ['required', 'string', 'max:11'],
            'email' => ['required', 'string'],
            'website' => ['nullable', 'url'],
            'fb' => ['nullable', 'url'],
            'x' => ['nullable', 'url'],
            'linkden' => ['nullable', 'url'],
            'whatsapp' => ['nullable', 'url'],
            'amentity[]' => ['nullable'],
            'description' => ['required', 'string', 'max:2000'],
            'file' => ['nullable'],
            'google_map' => ['required', 'string', 'max:255'],
            'seo_title' => ['required', 'string'],
            'seo_description' => ['required', 'string'],
            'status' => ['required', 'integer'],
            'is_featured' => ['required', 'integer']
        ];
    }
}
