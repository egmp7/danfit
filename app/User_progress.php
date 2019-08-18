<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class User_progress extends Model
{
    protected $table = 'user_progress';

    public function user(){
        $this->belongsTo('App/User');
    }
}
