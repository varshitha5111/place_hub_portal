<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class packageStoreRequest extends FormRequest
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
            'type'=>'required',
            'name'=>'required',
            'no_of_list'=>'required',
            'no_of_photo'=>'required',
            'no_of_amenity'=>'required',
            'no_of_video'=>'required',
            'price'=>'required',
            'no_featured_list'=>'required',
            'show_at_home'=>'required',
            'no_of_days'=>'required',
            'status'=>'required'
        ];
    }
}
