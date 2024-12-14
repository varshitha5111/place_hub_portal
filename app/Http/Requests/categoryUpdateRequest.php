<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryUpdateRequest extends FormRequest
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
            'bg_image'=>['nullable','image'],
            'icon'=>['nullable','image'],
            'name'=>['required','string','max:255'],
            'show_at_home'=>['required','boolean'],
            'status'=>['required','boolean']
        ];
    }
}
