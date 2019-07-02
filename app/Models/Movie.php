<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = [];

    protected $casts = [
        'likes_users' => 'array',
        'hates_users' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function stats()
    {
        return $this->hasMany('App\Models\Movie\Stats');
    }

    public function scopeWithInteractions($q)
    {
        $q->addSelect('movies.*');
        $q->leftJoin('movie_stats', 'movies.id', '=', 'movie_stats.movie_id');
        $q->addSelect(\DB::raw("COUNT(movie_stats.id) filter (WHERE movie_stats.action = 'like') AS likes"));
        $q->addSelect(\DB::raw("COUNT(movie_stats.id) filter (WHERE movie_stats.action = 'hate') AS hates"));
        $q->addSelect(\DB::raw("COALESCE(json_agg(movie_stats.user_id) filter (WHERE movie_stats.action = 'like'), '[]') AS likes_users"));
        $q->addSelect(\DB::raw("COALESCE(json_agg(movie_stats.user_id) filter (WHERE movie_stats.action = 'hate'), '[]') AS hates_users"));
        $q->groupBy('movies.id');
    }
}
