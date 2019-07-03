@extends('template.base')

{{-- @push('styles')
    <style>

    </style>
@endpush --}}

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $user->name }} ({{ $user->nickname }})</li>
        </ol>
    </nav>

    <div class="row mt-4">
        <div class="col-sm">
            @if(Auth::user())
                <div class="mb-4">
                    <a href="{{ route('movie.create') }}" class="btn btn-primary">Add a movie</a>
                </div>
            @endif

            <h3>Movies</h3>

            @foreach($user->movies as $movie)
                @include('components.movie', ['movie' => $movie])
            @endforeach
        </div>
    </div>

@stop
