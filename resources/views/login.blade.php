@extends('template')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">MovieRama</a></li>
            <li class="breadcrumb-item active" aria-current="page">Log in</li>
        </ol>
    </nav>

    <div class="row mt-4">
        <div class="col-sm">
            <div class="mb-2">
                <a href="{{ route('login.provider', 'github') }}" class="btn btn-secondary"><span class="fab fa-github"></span> Continue with Github</a>
            </div>
            <div class="mb-2">
                <a href="{{ route('login.provider', 'google') }}" class="btn btn-secondary"><span class="fab fa-google"></span> Continue with Google</a>
            </div>
            <div class="mb-2">
                <a href="{{ route('login.provider', 'facebook') }}" class="btn btn-secondary"><span class="fab fa-facebook"></span> Continue with Facebook</a>
            </div>
        </div>
    </div>

@stop
