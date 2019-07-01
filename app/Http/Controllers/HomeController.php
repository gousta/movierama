<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $movies = \App\Models\Movie::orderBy('created_at', 'desc')->get();

        return view('home', ['movies' => $movies]);
    }
}
