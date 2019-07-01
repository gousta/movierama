<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    protected $guarded = [];

    public function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }
}
