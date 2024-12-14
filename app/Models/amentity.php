<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class amentity extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'icon',
        'id',
        'status',
        'slug'
    ];
}
