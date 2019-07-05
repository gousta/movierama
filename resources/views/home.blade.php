@extends('template')

{{-- @push('styles')
    <style>

    </style>
@endpush --}}

@section('content')

    <div>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link {{ $sort === null ? 'active':'' }}" href="{{ route('home.index', ['sort' => null]) }}">Latest</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $sort === 'liked' ? 'active':'' }}" href="{{ route('home.index', ['sort' => 'liked']) }}">Most liked</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $sort === 'hated' ? 'active':'' }}" href="{{ route('home.index', ['sort' => 'hated']) }}">Most hated</a>
            </li>
        </ul>
    </div>

    <div class="row mt-4">
        <div class="col-sm">
            @foreach($movies as $movie)
                @include('movie.card', ['movie' => $movie])
            @endforeach

            {{ $movies->appends(['sort' => $sort])->links() }}
        </div>
    </div>

@stop
