<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmentityList extends Model
{
    use HasFactory;

    public function amentity()
    {
        return $this->belongsTo(amentity::class,'amentity_id');
    }
}
