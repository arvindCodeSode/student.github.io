<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
   protected $fillable=['imageUrl','dob','hobbies','user_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
