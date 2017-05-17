<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // user relations
    public function user()
    {
         return $this->belongsTo("App\User");
    }

    // like relations
    public function likes()
    {
         return $this->hasMany("App\Like");
    }
}
