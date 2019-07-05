<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show($nickname)
    {
        $user = User::with(['movies' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
            ->where('nickname', $nickname)
            ->firstOrFail();

        return view('user.index', ['user' => $user]);
    }

    public function signin()
    {
        return view('user.signin');
    }
}
