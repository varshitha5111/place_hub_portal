<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_setting extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'key',
        'value'
    ];
}
