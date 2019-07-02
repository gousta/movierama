<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $movies = \App\Models\Movie::orderBy('created_at', 'desc')->take(10)->get();

        return view('home', ['movies' => $movies]);
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }
}