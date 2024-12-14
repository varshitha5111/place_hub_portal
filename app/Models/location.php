<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'show_at_home',
        'id',
        'status',
        'slug'
    ];

    public function listings(){
        return $this->hasMany(allList::class,'location_id');
    }
}
