<?php

namespace App\Rules;
use App\Models\allList;
use App\Models\package;
use App\Models\subscription;
use Closure;

use Illuminate\Contracts\Validation\Rule;

class maximumFeatured implements Rule
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
        $packageFeaturedNo=subscription::withTrashed()->with('packages')->where('user_id',auth()->user()->id)->first();
        $packageFeaturedNo=$packageFeaturedNo->packages->no_of_featured_listing;
        if($packageFeaturedNo==-1){
            return true;
        }
        $userFeaturedNo = allList::where('user_id',auth()->user()->id)->where('is_featured',1)->count();
        if($packageFeaturedNo<=$userFeaturedNo){
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
        return 'The validation error message.';
    }
}
