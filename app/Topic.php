<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model{
    public function users() {
        return $this->belongsTo('App\User');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
