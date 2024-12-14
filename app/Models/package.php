<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class package extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'type',
        'name',
        'price',
        'number_of_days',
        'no_of_listing',
        'no_of_photos',
        'no_of_video',
        'no_of_amentities',
        'no_of_featured_listing',
        'show_at_home',
        'status'
    ];
}
