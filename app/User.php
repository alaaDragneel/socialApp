<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    // posts relations
    public function posts()
    {
         return $this->hasMany("App\Post");
    }

    // like relations
    public function likes()
    {
         return $this->hasMany("App\Like");
    }
}
