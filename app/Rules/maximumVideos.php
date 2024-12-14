<?php

namespace App\Rules;
use App\Models\allList;
use App\Models\package;
use App\Models\subscription;
use Closure;

use Illuminate\Contracts\Validation\Rule;

class maximumVideos implements Rule
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
        $packageVideoNo=subscription::withTrashed()->with('packages')->where('user_id',auth()->user()->id)->first();
        $packageVideoNo=$packageVideoNo->packages->no_of_video;
        // $userImgNo = allList::where('user_id',auth()->user()->id)->count();
        return $packageVideoNo;
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
