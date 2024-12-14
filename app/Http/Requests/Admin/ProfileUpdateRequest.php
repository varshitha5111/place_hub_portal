<?php

namespace App\Http\Requests\Admin;

use Faker\Guesser\Name;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'name'=>['required','string','max:255'],
            'email'=>['required','email','max:255'],
            'avatar'=>['nullable','image','max:2000'],
            'banner'=>['nullable','image','max:2000'],
            'about'=>['required','string','max:2000'],
            'address'=>['required','string','max:255'],
            'website'=>['nullable','url'],
            'fb'=>['nullable','url'],
            'twitter'=>['nullable','url'],
            'insta'=>['nullable','url'],
            'linkden'=>['nullable','url'],
            'whatsapp'=>['nullable','url'],
            'phone'=>['required','max:11']
        ];
    }
}
