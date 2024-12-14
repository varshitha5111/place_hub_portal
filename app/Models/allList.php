<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class allList extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'category_id',
        'location_id',
        'user_id',
        'package_id',
        'image',
        'thumbnail_image',
        'title',
        'slug',
        'description',
        'phone',
        'address',
        'email',
        'website',
        'fb',
        'x_link',
        'linkden',
        'whatsapp',
        'is_verified',
        'is_featured',
        'views',
        'file',
        'google_map_embed_code',
        'expiry_date',
        'seo_title',
        'seo_description',
        'status',
        'is_approved',
    ];


    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function location()
    {
        return $this->belongsTo(location::class, 'location_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function imageGallery()
    {
        return $this->hasMany(listingImageGallery::class, 'list_id', 'id');
    }

    public function videoGallery()
    {
        return $this->hasMany(listingVideoGallery::class, 'list_id', 'id');
    }

    public function amentities()
    {
        return $this->hasMany(AmentityList::class, 'list_id', 'id');
    }

    public function schedule()
    {
        return $this->hasMany(listingSchedule::class, 'list_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(review::class,'list_id','id');
    }
}
