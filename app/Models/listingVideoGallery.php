<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listingVideoGallery extends Model
{
    use HasFactory;

    
    public function all_List()
    {
        return $this->belongsTo(allList::class,'list_id');
    }
}
