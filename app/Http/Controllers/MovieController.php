<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Movie;
use App\Models\Movie\Stats;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Request;

class MovieController extends Controller
{
    private function validateMovieData($request)
    {
        return $request->validate([
            'title' => 'required|unique:movies|max:255',
            'description' => 'required|max:50000',
        ]);
    }

    public function create()
    {
        $user = Auth::user();

        return view('movie.create', [
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateMovieData($request);

        $user = \Auth::user();
        $validatedData['user_id'] = $user->id;

        Movie::create($validatedData);

        return redirect()->route('user.show', ['nickname' => $user->nickname]);
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

    public function edit($id)
    {
        $user = Auth::user();
        $movie = Movie::findOrFail($id);

        if ($movie->user_id !== $user->id) {
            return redirect()->route('show.user', $user->id);
        }

        return view('movie.edit', [
            'movie' => $movie,
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $this->validateMovieData($request);
        $movie = Movie::findOrFail($id);
        $movie->update($validatedData);

        return redirect()->route('movie.edit', $movie->id);
    }

    public function delete($id)
    {
        $user = Auth::user();
        $movie = Movie::findOrFail($id);
        Stats::where('movie_id', $movie->id)->delete();
        $movie->delete();

        return redirect()->route('user.show', $user->nickname);
    }
}
