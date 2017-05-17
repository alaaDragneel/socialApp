<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //user relation

    public function user()
    {
         return $this->belongsTo('App\User');
    }

    //post relation

    public function post()
    {
         return $this->belongsTo('App\Post');
    }

    
}
