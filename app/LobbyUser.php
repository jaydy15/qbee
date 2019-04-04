<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LobbyUser extends Model
{
    public $table = "lobby_user";
    public function user(){
        return $this->hasMany('App\User');
    }

    public function quiz(){
        return $this->hasMany('App\Quiz');
    }
}
