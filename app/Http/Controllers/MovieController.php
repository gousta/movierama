<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Request;

class MovieController extends Controller
{
    public function create()
    {
        return view('movie.create');
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

    public function act(Request $request, $id)
    {
        $action = $request->input('action', null);

        $movie = \App\Models\Movie::findOrFail($id);
        dd($id, $action);
    }
}