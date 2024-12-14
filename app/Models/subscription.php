<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class subscription extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'id',
        'package_id',
        'order_id',
        'user_id'
    ];

    public function packages()
    {
        return $this->belongsTo(package::class,'package_id')->withTrashed();
    }

    public function orders()
    {
        return $this->belongsTo(order::class,'order_id');
    }
}
