<?php

namespace App\Http\Controllers\API\Transformers;

use League\Fractal;
use App\Models\Movie;

class MovieTransformer extends Fractal\TransformerAbstract
{
    public function transform(Movie $movie)
    {
        return [
            'id' => $movie->id,
            'title' => $movie->title,
            'description' => $movie->description,
            'likes' => $movie->likes,
            'hates' => $movie->hates,
        ];
    }
}