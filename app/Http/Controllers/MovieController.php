<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Movie;
use App\Models\Movie\Stats;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Request;

class MovieController extends Controller
{
    public function create()
    {
        return view('movie.create', [
            'user' => Auth::user(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:movies|max:255',
            'description' => 'required|max:50000',
        ]);

        $user = \Auth::user();
        $validatedData['user_id'] = $user->id;

        Movie::create($validatedData);

        return redirect(route('user.show', ['nickname' => $user->nickname]));
    }

    public function act(Request $request)
    {
        $movieId = $request->input('movieId', null);
        $action = $request->input('action', null);

        $user = Auth::user();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'error' => 'You need to be signed in to ' . $action . ' this movie!',
            ]);
        }

        $stat = Stats::where('user_id', $user->id)
            ->where('movie_id', $movieId)
            ->where('action', $action)
            ->first();

        if ($stat) { // user wants to remove his action
            $stat->delete();
            $action = null;
        } else { // user wants to change his action
            Stats::updateOrCreate(
                ['user_id' => $user->id, 'movie_id' => $movieId],
                ['action' => $action]
            );
        }

        $movie = Movie::withInteractions()->find($movieId);

        return response()->json([
            'status' => 'ok',
            'data' => [
                'likes' => $movie->likes,
                'hates' => $movie->hates,
                'action' => $action
            ]
        ]);
    }
}