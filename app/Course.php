<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
