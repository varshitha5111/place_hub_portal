<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    use HasFactory;

    public function recieverProfile(){
        return $this->belongsTo(User::class,'reciever_id');
    }

    public function listings(){
        return $this->belongsTo(allList::class,'list_id');
    }

    public function senderProfile(){
        return $this->belongsTo(User::class,'sender_id');
    }

}
