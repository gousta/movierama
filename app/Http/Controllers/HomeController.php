<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function index($sort = null)
    {
        $movies = \App\Models\Movie::with('user');
        $movies->withInteractions();

        switch ($sort) {
            case 'liked':
                $movies->orderBy('likes', 'desc');
                break;
            case 'hated':
                $movies->orderBy('hates', 'desc');
                break;
            default:
                $movies->orderBy('created_at', 'desc');
                break;
        }

        $movies = $movies->paginate(5);

        return view('home', ['sort' => $sort, 'movies' => $movies]);
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }
}
