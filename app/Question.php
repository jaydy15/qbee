<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function quiz(){
        return $this->belongsTo('App\Quiz' ,'quiz_id');
    }

    public function user(){
        return $this->belongsTo('App\User', user_id);
    }

    //protected $fillable = ['question', 'question_type', 'points', 'time_limit'];
}
