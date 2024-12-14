<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'show_at_home',
        'status',
        'icon_image',
        'bg_image',
        'slug'
    ];

    public function listings(){
        return $this->hasMany(allList::class,'category_id');
    }
}
