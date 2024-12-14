<?php

namespace App\Rules;

use App\Models\allList;
use App\Models\package;
use App\Models\subscription;
use Closure;
use Illuminate\Contracts\Validation\Rule;


class maximumListing implements Rule
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
        $packageListingNo=subscription::withTrashed()->with('packages')->where('user_id',auth()->user()->id)->first();
        $packageListingNo=$packageListingNo->packages->no_of_listing;
        $userListingNo = allList::where('user_id',auth()->user()->id)->count();
        if($packageListingNo<=$userListingNo ){
            return false;
        }
        else{
            return true;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You Have Listed Maximum Listisng';
    }
}
