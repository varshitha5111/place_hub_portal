<?php

namespace App\Rules;
use App\Models\allList;
use App\Models\package;
use App\Models\subscription;
use Closure;

use Illuminate\Contracts\Validation\Rule;

class maximumImages implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->passes();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute=null, $value=null)
    {
        $packageImgNo=subscription::withTrashed()->with('packages')->where('user_id',auth()->user()->id)->first();
        $packageImgNo=$packageImgNo->packages->no_of_photos;
        // $userImgNo = allList::where('user_id',auth()->user()->id)->count();
        return $packageImgNo; 

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
