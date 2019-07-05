<?php

namespace App\Http\Controllers\API;

use App\Models\Movie;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\API\Transformers\MovieTransformer;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::withInteractions()
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return fractal($movies, new MovieTransformer())->respond();
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        return fractal($movie, new MovieTransformer())->respond();
    }
}