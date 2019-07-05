<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DocsController extends Controller
{
    public function index()
    {
        return view('docs.index');
    }
}