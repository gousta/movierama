<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function stats()
    {
        return $this->hasMany('App\Models\Movie\Stats');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Movie\Stats')->where('action', '=', 'like');
    }

    public function hates()
    {
        return $this->hasMany('App\Models\Movie\Stats')->where('action', '=', 'hate');
    }
}
