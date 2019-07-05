@extends('template')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">MovieRama</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sign in</li>
        </ol>
    </nav>

    <div class="row mt-4">
        <div class="col-sm">
            <a href="{{ route('login.provider', 'github') }}" class="btn btn-secondary"><span class="fab fa-github"></span> Sign in with Github</a>
            <a href="{{ route('login.provider', 'google') }}" class="btn btn-secondary"><span class="fab fa-google"></span> Sign in with Google</a>
            <a href="{{ route('login.provider', 'facebook') }}" class="btn btn-secondary"><span class="fab fa-facebook"></span> Sign in with Facebook</a>
        </div>
    </div>

@stop
