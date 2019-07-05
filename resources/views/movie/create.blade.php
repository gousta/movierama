@extends('template')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">MovieRama</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.show', ['nickname' => $user->nickname]) }}">My Movies</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add a movie</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-sm">
            <form action="{{ route('movie.store') }}" method="post">
                {{ csrf_field() }}

                @include('movie.form')
            </form>
        </div>
    </div>

@stop
