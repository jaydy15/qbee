<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function user(){
        return $this->hasMany('App\User');
    }

    public function quiz(){
        return $this->hasMany('App\Quiz');
    }

}
